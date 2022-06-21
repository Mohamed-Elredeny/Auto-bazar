<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Generator extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'sell_type_id',
        'country',
        'ability',
        'make_id',
        'model',
        'status_id',
        'capacity',
        'fuel_tank_size',
        'fuel_type_id',
        'engine_type',
        'number_of_phase',
        'frequency_rate',
        'muffler_box',
        'description',
        'user_id',
        'images',
        'price',
        'title'
    ];

    public function category()
    {
        return $this->belongsTo('App\models\Category','category_id');
    }

    public function sellType()
    {
        return $this->belongsTo('App\models\SellType','sell_type_id');
    }

    public function make()
    {
        return $this->belongsTo('App\models\Make','make_id');
    }

    public function status()
    {
        return $this->belongsTo('App\models\Status','status_id');
    }

    public function fuelType()
    {
        return $this->belongsTo('App\models\FuelType','fuel_type_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
