<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('category', CategoryController::class);
Route::resource('products', ProductController::class);

Route::view('/test/products', 'products.test');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::resource('admin/categories', AdminCategoryController::class)
    ->names('admin.categories');

Route::resource('admin/products', ProductController::class)
    ->names('admin.products');