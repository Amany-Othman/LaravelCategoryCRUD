<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $categoriesCount = Category::count();
        $productsCount = Product::count();

        return view('admin.dashboard', compact(
            'categoriesCount',
            'productsCount'
        ));
    }
}