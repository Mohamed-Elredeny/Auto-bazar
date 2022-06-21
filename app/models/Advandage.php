<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Advandage extends Model
{
    protected $table = 'advandages';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'image',
    ];
}
