<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\DoctorController;

use App\Models\HomeContent;
use App\Models\Doctor;
/*      → English
/ar     → Arabic */

Route::get('/', function () {
    app()->setLocale('en');

    $homeContents = HomeContent::all()
        ->groupBy('section');

    $doctors = Doctor::all();

    return view('client.home', compact('homeContents', 'doctors'));
});


Route::get('/{locale}', function ($locale) {

    $homeContents = HomeContent::all()
        ->groupBy('section');

    $doctors = Doctor::all();

    return view('client.home', compact('homeContents', 'doctors'));
})
    ->where('locale', 'ar')
    ->middleware('set.locale');

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

/* get el page bta3t el register
GET /register
      ↓
showRegister()
      ↓
register.blade.php */

/* el route ely el user bu post mno el register data bta3to */
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');

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


Route::resource('admin/home-contents', HomeContentController::class)
    ->names('admin.home-contents');
  
    
Route::resource('admin/doctors', DoctorController::class)
    ->names('admin.doctors');    