<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class TypeCategory extends Model
{
    protected $table = 'type_categories';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'image',
        'sell_type_id'
    ];

    public function sellType()
    {
        return $this->belongsTo('App\models\SellType','sell_type_id');
    }
}
