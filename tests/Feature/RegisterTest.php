<?php

use App\Models\Event;

it('allows an user to view an event details', function () {
    $event = Event::factory()->create();

    $this->get(route('events.show', $event->uuid))
        ->assertOk()
        ->assertSee($event->title)
        ->assertSee($event->description);
});

it('allows an user to register for an event', function () {
    $event = Event::factory()->create();

    $this->postJson(route('registrations.store', $event->uuid), ['name' => 'Hans'])
        ->assertNoContent();

    expect($event->registrations)->toHaveCount(1)
        ->first()->name->toBe('Hans');
});
