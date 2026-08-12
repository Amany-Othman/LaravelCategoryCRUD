<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);
/* get el page bta3t el register 
GET /register
      ↓
showRegister()
      ↓
register.blade.php*/
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');
// el route ely el user bu post mno el register data bta3to 
Route::post('/register', [AuthController::class, 'register']);


Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::resource('category', CategoryController::class);
Route::resource('products', ProductController::class);

Route::view('/test/products', 'products.test');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'prevent.back'])
    ->name('admin.dashboard');

Route::resource('admin/categories', AdminCategoryController::class)
    ->names('admin.categories');

Route::resource('admin/products', AdminProductController::class)
    ->names('admin.products');