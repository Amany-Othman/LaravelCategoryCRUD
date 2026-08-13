<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_name',
        'name',
        'age',
        'phone',
        'email',
        'appointment_date',
        'appointment_time',
        'status',
    ];
}