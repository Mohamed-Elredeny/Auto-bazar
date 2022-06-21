<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'Details_ar',
        'Details_en',
        'Details_ku',
        'price',
        'image'
    ];
}
