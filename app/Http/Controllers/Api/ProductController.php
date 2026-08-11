<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

    return response()->json([
        'success' => true,
        'products' => $products,
    ]);

    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'status' => 'nullable',
    ]);

    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'status' => $request->status ?? 0,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Product created successfully',
        'product' => $product,
    ], 201);
}
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
        'success' => true,
        'product' => $product,
    ]);
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'price' => 'required|numeric',
        'status' => 'nullable',
    ]);

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'status' => $request->status ?? 0,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Product updated successfully',
        'product' => $product,
    ]);
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
         $product->delete();

    return response()->json([
        'success' => true,
        'message' => 'Product deleted successfully',
    ]);
    }
}