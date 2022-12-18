<?php

use App\Models\Event;

it('has a valid factory', function () {
    Event::factory()->create();

    expect(Event::count())->toBe(1);
});
