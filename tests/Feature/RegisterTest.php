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
