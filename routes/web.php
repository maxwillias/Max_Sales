<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // dd(Product::first()->sales()->where( 'id', '1')->first());
    return view('welcome');
});

Route::resources([
    'products' => ProductController::class,
    'sales' => SaleController::class,
    'categories' => CategoryController::class,
]);
