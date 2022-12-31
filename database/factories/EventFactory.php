<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'start' => $this->faker->dateTimeThisMonth(),
            'end' => $this->faker->dateTimeThisMonth(),
            'address' => $this->faker->address(),
            'max_registrations' => null,
            'registrations_public' => $this->faker->boolean(),
            'registration_closes' => null,
        ];
    }
}
