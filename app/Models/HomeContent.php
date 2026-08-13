<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'section',
        'field',
        'value_en',
        'value_ar',
        'link',
    ];
}