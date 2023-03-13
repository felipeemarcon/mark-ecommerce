<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->unique()->safeEmail(),
            'price' => fake()->randomFloat(2, 2, 1023),
            'image' => fake()->imageUrl(800, 450, 'Mark Store')
        ];
    }
}
