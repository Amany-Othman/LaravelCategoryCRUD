<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name_en',
        'name_ar',
        'description_en',
        'description_ar',
        'icon',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}