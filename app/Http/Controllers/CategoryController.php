<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  get categories from the database .. each 10 in a page
        $categories = Category::paginate(10);
        // view index page ..compact prepare categories enha ttb3t ll view page
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
      // validate according to the fillables in the category model    
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'required|string|max:255',
    'status' => 'nullable',
]);

Category::create([
    'name' => $request->name,
    'description' => $request->description,
    'status' => $request->status ? 1 : 0,
]);

//after creation go back to index with a message if the category is created 
return redirect()
    ->route('category.index')
    ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    
    //Category $category -> we need to know the id of the category we're editing
    // compact('category') btb3t el category de ll edit blade 
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'status' => 'nullable',
    ]);
    
    $category->update([
    'name' => $request->name,
    'description' => $request->description,
    'status' => $request->status ? 1 : 0,
]);
return redirect()
    ->route('category.index')
    ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}