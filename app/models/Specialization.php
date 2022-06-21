<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specializations';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'image',
    ];
}
