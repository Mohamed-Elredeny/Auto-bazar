<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Gearbox extends Model
{
    protected $table = 'gearboxes';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        '',
    ];
}
