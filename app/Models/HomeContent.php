<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class HomeContent extends Model
{
    // de ely btkhly el value t support en & ar
    use HasTranslations;
   // laravel y save key + value
    protected $fillable = [
        'key',
        'value',
    ];
  //bn2ol l package en value feha translations 
    public array $translatable = [
        'value',
    ];
}