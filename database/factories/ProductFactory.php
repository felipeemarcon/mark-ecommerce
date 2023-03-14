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
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraphs(4, true),
            'price' => $this->faker->randomFloat(2, 2, 1023),
            'image' => $this->faker->imageUrl(800, 450, 'Mark Store'),
            'stock' => $this->faker->randomDigit()
        ];
    }
}
