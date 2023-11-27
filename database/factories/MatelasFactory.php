<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matelas>
 */
class MatelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'cover' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2,100, 1500),
            'discount' => fake()->numberBetween(0,500),
        ];
    }
}
