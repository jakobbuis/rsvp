<?php

use App\Models\Event;
use Carbon\Carbon;

it('has a valid factory', function () {
    Event::factory()->create();

    expect(Event::count())->toBe(1);
});

it('renders event timespans over multiple days', function () {
    expect(Event::factory()->make([
        'start' => new Carbon('2022-03-09 21:05'),
        'end' => new Carbon('2022-03-10 21:06'),
    ])->timespan)->toBe('09 maart 2022 21:05 — 10 maart 2022 21:06');
});

it('renders event timespans without a defined end', function () {
    expect(Event::factory()->make([
        'start' => new Carbon('2022-03-09 21:05'),
        'end' => null,
    ])->timespan)->toBe('09 maart 2022 21:05');
});

it('renders event timespans on a single day', function () {
    expect(Event::factory()->make([
        'start' => new Carbon('2022-03-09 21:05'),
        'end' => new Carbon('2022-03-09 22:00'),
    ])->timespan)->toBe('09 maart 2022 21:05 — 22:00');
});

