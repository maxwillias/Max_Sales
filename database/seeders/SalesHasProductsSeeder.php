<?php

namespace Database\Seeders;

use App\Models\SalesHasProducts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesHasProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesHasProducts::factory(50)->create();
    }
}
