<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        '',
    ];
}
