<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $table = 'shop_types';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'image'
    ];
    public $timestamps = false;
}
