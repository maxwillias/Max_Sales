<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(Product::first()->sales()->where( 'id', '1')->first());
    return view('welcome');
});
