<?php

use App\Models\Event;

it('allows an user to register for an event', function () {
    $event = Event::factory()->create();

    $this->postJson(route('registrations.store', $event->id), ['name' => 'Hans'])
        ->assertNoContent();

    expect($event->registrations)->toHaveCount(1)
        ->first()->name->toBe('Hans');
});
