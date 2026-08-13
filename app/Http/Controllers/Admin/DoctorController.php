<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index()
{
    $doctors = Doctor::all();

    return view('admin.doctors.index', compact('doctors'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    return view('admin.doctors.create');
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'specialty_en' => 'required|string|max:255',
        'specialty_ar' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('doctors', 'public');
        $validated['image'] = 'storage/' . $imagePath;
    }

    Doctor::create($validated);

    return redirect()
        ->route('admin.doctors.index')
        ->with('success', 'Doctor added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $doctor = Doctor::findOrFail($id);

    return view('admin.doctors.edit', compact('doctor'));
}
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $doctor = Doctor::findOrFail($id);

    $validated = $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'specialty_en' => 'required|string|max:255',
        'specialty_ar' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('doctors', 'public');
        $validated['image'] = 'storage/' . $imagePath;
    }

    $doctor->update($validated);

    return redirect()
        ->route('admin.doctors.index')
        ->with('success', 'Doctor updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $doctor = Doctor::findOrFail($id);

    $doctor->delete();

    return redirect()
        ->route('admin.doctors.index')
        ->with('success', 'Doctor deleted successfully.');
}
}