<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'specialty_en',
        'specialty_ar',
        'image',
    ];
}