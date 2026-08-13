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
            'locale' => 'required|in:en,ar',
        ]);

        app()->setLocale($validated['locale']);

        $validated['appointment_date'] = Carbon::createFromFormat(
            'm/d/Y',
            $validated['appointment_date']
        )->format('Y-m-d');

        $time = trim($validated['appointment_time']);

        if (str_contains($time, 'صباح')) {
            $time = str_replace('صباح', 'AM', $time);

            $validated['appointment_time'] = Carbon::createFromFormat(
                'g:i A',
                $time
            )->format('H:i:s');

        } elseif (str_contains($time, 'مساء')) {
            $time = str_replace('مساء', 'PM', $time);

            $validated['appointment_time'] = Carbon::createFromFormat(
                'g:i A',
                $time
            )->format('H:i:s');

        } elseif (preg_match('/^\d{2}:\d{2}$/', $time)) {

            $validated['appointment_time'] = Carbon::createFromFormat(
                'H:i',
                $time
            )->format('H:i:s');

        } else {

            $validated['appointment_time'] = Carbon::createFromFormat(
                'g:i A',
                strtolower($time)
            )->format('H:i:s');
        }

       $locale = $validated['locale'];

unset($validated['locale']);

Appointment::create($validated);

$message = $locale === 'ar'
    ? 'تم حجز موعدك! نتطلع لرؤيتك.'
    : 'Your appointment is booked! We look forward to seeing you.';

return back()->with('success', $message);
    }
}