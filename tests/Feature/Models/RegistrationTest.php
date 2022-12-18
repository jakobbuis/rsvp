<?php

use App\Models\Registration;

it('has a valid factory', function () {
    Registration::factory()->create();

    expect(Registration::count())->toBe(1);
});
