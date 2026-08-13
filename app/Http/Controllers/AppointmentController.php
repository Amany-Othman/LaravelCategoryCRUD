<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'doctor_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'phone' => 'required|string|max:30',
            'email' => 'required|email|max:255',
            'appointment_date' => 'required',
            'appointment_time' => 'required',
        ]);

        $validated['appointment_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['appointment_date']
        )->format('Y-m-d');

        $validated['appointment_time'] = Carbon::createFromFormat(
            'g:i a',
            strtolower($validated['appointment_time'])
        )->format('H:i:s');

        Appointment::create($validated);

        return back()->with(
            'success',
            'Your appointment has been booked successfully.'
        );
    }
}