<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\models\City','city_id');
    }
}
