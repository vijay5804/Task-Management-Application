<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement([
                'pending',
                'in_progress',
                'completed',
            ]),
            'due_date' => fake()->dateTimeBetween('now', '+30 days'),
            'category_id' => fake()->numberBetween(1, 5),
        ];
    }
}