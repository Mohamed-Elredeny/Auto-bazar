<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
    ];

    public function products()
    {
        return $this->hasMany('App\models\Product','category_id');
    }
}
