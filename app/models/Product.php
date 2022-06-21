<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'rent',
        'category_id',
        'sell_type_id',
        'section_id',
        'type_category_id',
        'make_id',
        'model',
        'status_id',
        'year',
        'gearbox_id',
        'fuel_type_id',
        'work_hour',
        'color',
        'price',
        'payment_method',
        'city_id',
        'district_id',
        'distance',
        'advandage_id',
        'interior_brush',
        'interior_color',
        'product_type',
        'user_id',
        'images',
        'description',
        'title',


        'country',
	    'ability',
	    'capacity',
	    'fuel_tank_size',
		'engine_type',
        'number_of_phase',
		'frequency_rate',
        'muffler_box',
        'rent_type',
        'rent_period',

        'type_category_id_parts',
        'slinder_number',
        'engine_capacity'
    ];

    public function category()
    {
        return $this->belongsTo('App\models\Category','category_id');
    }

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

    public function status()
    {
        return $this->belongsTo('App\models\Status','status_id');
    }

    public function gearbox()
    {
        return $this->belongsTo('App\models\Gearbox','gearbox_id');
    }

    public function fuelType()
    {
        return $this->belongsTo('App\models\FuelType','fuel_type_id');
    }

    public function district()
    {
        return $this->belongsTo('App\models\District','district_id');
    }
    public function advandage()
    {
        return $this->belongsTo('App\models\Advandage','advandage_id');
    }

    public function city()
    {
        return $this->belongsTo('App\models\City','city_id');
    }

    public function user()
    {
        return $this->belongsTo('App\models\Vendor','user_id');
    }
}
