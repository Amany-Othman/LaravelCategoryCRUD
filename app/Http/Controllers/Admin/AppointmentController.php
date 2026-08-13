<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index()
{
    $appointments = Appointment::latest()->get();

    return view('admin.appointments.index', compact('appointments'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    $appointment = Appointment::findOrFail($id);

    return view('admin.appointments.edit', compact('appointment'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $appointment = Appointment::findOrFail($id);

    $validated = $request->validate([
        'doctor_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'age' => 'required|integer|min:1|max:120',
        'phone' => 'required|string|max:30',
        'email' => 'required|email|max:255',
        'appointment_date' => 'required|date',
        'appointment_time' => 'required',
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    $appointment->update($validated);

    return redirect()
        ->route('admin.appointments.index')
        ->with('success', 'Appointment updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $appointment = Appointment::findOrFail($id);

    $appointment->delete();

    return redirect()
        ->route('admin.appointments.index')
        ->with('success', 'Appointment deleted successfully.');
}
}