<?php

use App\Http\Livewire\RegistrationForm;
use App\Models\Event;
use Carbon\Carbon;
use Livewire\Livewire;

it('allows an user to view an event details', function () {
    $event = Event::factory()->create();

    $this->get(route('events.show', $event->uuid))
        ->assertOk()
        ->assertSee($event->title)
        ->assertSee($event->description);
});

it('allows an user to register for an event', function () {
    $event = Event::factory()->create();

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->set('name', 'Hans')
        ->call('register');

    expect($event->registrations)->toHaveCount(1)
        ->first()->name->toBe('Hans');
});

it('enforces a deadline without registration limit', function () {
    Carbon::setTestNow('2022-03-09 21:00:00');
    $event = Event::factory()->create([
        'max_registrations' => null,
        'registration_closes' => '2022-03-09 21:05:00',
    ]);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertDontSee('Aanmelden niet meer mogelijk');

    Carbon::setTestNow('2022-03-09 21:10:00');

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertSee('Aanmelden niet meer mogelijk');
});

it('enforces a deadline with registration limit', function () {
    Carbon::setTestNow('2022-03-09 21:00:00');
    $event = Event::factory()->create([
        'max_registrations' => '1',
        'registration_closes' => '2022-03-09 21:05:00',
    ]);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertDontSee('Aanmelden niet meer mogelijk');

    Carbon::setTestNow('2022-03-09 21:10:00');

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertSee('Aanmelden niet meer mogelijk');
});

it('enforces a registration limit without deadline', function () {
    Carbon::setTestNow('2022-03-09 21:00:00');
    $event = Event::factory()->create([
        'max_registrations' => 1,
        'registration_closes' => null,
    ]);

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(0);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertDontSee('Aanmelden niet meer mogelijk')
        ->set('name', 'Hans')
        ->call('register')
        ->assertSee('Hans aangemeld');

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(1);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertSee('Aanmelden niet meer mogelijk')
        ->set('name', 'Inge')
        ->call('register')
        ->assertSee('Je kunt je niet meer aanmelden');

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(1);
});

it('enforces a registration limit with deadline', function () {
    Carbon::setTestNow('2022-03-09 21:00:00');
    $event = Event::factory()->create([
        'max_registrations' => 1,
        'registration_closes' => '2022-03-09 21:05:00',
    ]);

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(0);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertDontSee('Aanmelden niet meer mogelijk')
        ->set('name', 'Hans')
        ->call('register')
        ->assertSee('Hans aangemeld');

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(1);

    Livewire::test(RegistrationForm::class, ['event' => $event])
        ->assertSee('Aanmelden niet meer mogelijk')
        ->set('name', 'Inge')
        ->call('register')
        ->assertSee('Je kunt je niet meer aanmelden');

    $event = $event->fresh();
    expect($event->registrations)->toHaveCount(1);
});
