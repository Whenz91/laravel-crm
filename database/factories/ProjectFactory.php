<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(5, true),
            'description' => fake()->paragraph(25),
            'user_id' => User::all()->random(),
            'client_id' => Client::all()->random(),
            'deadline' => fake()->dateTimeBetween('-1 week', '+1 week'),
        ];
    }

    public function statusclose(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'close',
            ];
        });
    }
}
