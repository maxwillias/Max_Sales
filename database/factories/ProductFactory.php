<?php

namespace Database\Factories;

use App\Models\Category;
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
        $category = Category::factory()->create();

        return [
            'name' => fake()->name(),
            'photo' => fake()->imageUrl(),
            'price' => fake()->randomFloat(2, 10, 100),
            'category' => $category->id,
            'quantity' => fake()->randomNumber(2),
        ];
    }
}
