<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductWebController extends Controller
{
    public function index()
{
    // get all the products existed in products table and  store them in $products
    $products = Product::all();
   //view el blade de + send the products to it
    return view('products.index', compact('products'));
}


   
      public function create()
   {
    //to open the create form 
    return view('products.create');
    } 

   public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
    ]);

    $validated['status'] = $request->has('status');

    Product::create($validated);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product created successfully.');
}

public function show(Product $product)
{

//$product  -> laravel bygeb el product ely el id bta3ha fel url
//route model binding
    return view('products.show', compact('product'));
}

public function edit(Product $product)
{
    //htft7lo fom el edit bta3t el product ely 3ndo el id dh
    return view('products.edit', compact('product'));
}


public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
    ]);

    $validated['status'] = $request->has('status');

    $product->update($validated);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product updated successfully.');
}


}