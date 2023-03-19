<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->sentence(3);

        return [
            'name'                          => $name,
            'slug'                          => Str::slug($name),
            'description'                   => $this->faker->paragraphs(4, true),
            'sku'                           => 'SKU-' . $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'product_category_id'           => ProductCategory::factory(),
            'product_attribute_id'          => mt_rand(1, 15),
            'product_inventory_id'          => mt_rand(1, 50),
            'price'                         => $this->faker->randomFloat(2, 2, 1023),
            'image'                         => $this->faker->imageUrl(800, 450, 'Mark Store'),
            'stock'                         => $this->faker->randomDigit()
        ];
    }
}
