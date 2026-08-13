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

    public function getLocalizedValue(): ?string
    {
        return app()->getLocale() === 'ar'
            ? $this->value_ar
            : $this->value_en;
    }
}