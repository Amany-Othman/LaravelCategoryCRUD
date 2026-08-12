<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);
         $image = $request->file('image');
         //3mlna unset l2n el image msh column fe products 
         //3ayzenha tb2a saved as media 
        unset($validated['image']);
        $validated['status'] = $request->has('status') ? 1 : 0;
        
        $product = Product::create($validated);

        if ($image) {
            //addMedia 3rft a use it hna 3shan el edit ely 3mlnah l model el product
            //lw el user ekhtar image (lw l2n e7na 3amlenha nullable fel validation)
            //ykhly el media de mortbta bl product dh ely el user 3mlo create
            //media library hya ely bt3ml dh
            //->toMediaCollection('products')  y7ot el image fe media collection esmo products 
            
        $product->addMedia($image)
        ->toMediaCollection('products');
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);
        $image = $request->file('image');
        unset($validated['image']);
        $validated['status'] = $request->has('status') ? 1 : 0;
 
        $product->update($validated);
        if ($image) {

    $product->clearMediaCollection('products');

    $product->addMedia($image)
        ->toMediaCollection('products');
}
        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}