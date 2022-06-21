<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class CarsRentalProduct extends Model
{
    protected $table = 'cars_rental_products';

    protected $fillable = [
        'sell_type_id',
        'section_id',
        'type_category_id',
        'make_id',
        'year',
        'rent_period',
        'city_id',
        'district_id',
        'price',
        'user_id',
        'images'
    ];

    public function sellType()
    {
        return $this->belongsTo('App\models\SellType','sell_type_id');
    }

    public function section()
    {
        return $this->belongsTo('App\models\Section','section_id');
    }

    public function typeCategory()
    {
        return $this->belongsTo('App\models\TypeCategory','type_category_id');
    }

    public function make()
    {
        return $this->belongsTo('App\models\Make','make_id');
    }

    public function district()
    {
        return $this->belongsTo('App\models\District','district_id');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City','city_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
