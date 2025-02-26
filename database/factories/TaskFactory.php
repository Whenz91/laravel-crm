<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
