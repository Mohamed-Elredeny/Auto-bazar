<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    protected $table = 'fuel_types';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        '',
    ];
}
