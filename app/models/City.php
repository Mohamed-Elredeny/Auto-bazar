<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'code',
        'flag',
        'currency'
    ];

    public function districts()
    {
        return $this->hasMany('App\models\District','city_id');
    }
}
