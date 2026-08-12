<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

//interface HasMedia bt2ol en el product by support el media library

class Product extends Model implements HasMedia
{
    //feha kol el funcs ely hnst5dmha m3 el images
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];
}