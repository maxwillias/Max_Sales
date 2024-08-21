<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = Product::factory(5)->create();

        $productsArray = [];
        $totalProducts = 0;
        $totalPrice = 0;

        foreach($products as $product){
            $quantityProducts = fake()->randomNumber(1);
            $productsArray = [
                'quantity' => $quantityProducts,
                'product' => $product->name,
            ];

            $totalProducts += $quantityProducts;
            $totalPrice += $quantityProducts * $product->price;
        }

        return [
            'products' => json_encode($productsArray),
            'total_products' => $totalProducts,
            'total_price' => $totalPrice
        ];
    }
}
