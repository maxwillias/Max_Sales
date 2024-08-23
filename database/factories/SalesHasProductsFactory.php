<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SalesHasProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sale = Sale::factory()->create();
        $product = Product::factory()->create();

        return [
            'sale_id' => $sale->id,
            'product_id' => $product->id,
            'quantity_products' => fake()->randomNumber(2),
        ];
    }
}
