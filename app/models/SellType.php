<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class SellType extends Model
{
    protected $table = 'sell_types';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'category_id',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\models\Category','category_id');
    }

    public function sections()
    {
        return $this->hasMany('App\models\Section','sell_type_id');
    }

    public function typeCategories()
    {
        return $this->hasMany('App\models\TypeCategory','sell_type_id');
    }

    public function makes()
    {
        return $this->hasMany('App\models\Make','sell_type_id');
    }
}
