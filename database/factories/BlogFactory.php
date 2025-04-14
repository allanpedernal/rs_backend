<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(1, true),
            'status' => $this->faker->randomElement(['Published', 'Hidden']),
            'created_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
