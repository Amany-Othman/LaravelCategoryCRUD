<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //the only allowed fields to be assigned  
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}