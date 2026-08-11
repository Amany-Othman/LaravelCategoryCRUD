<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);
Route::resource('products', ProductWebController::class);   


Route::view('/test/products', 'products.test');