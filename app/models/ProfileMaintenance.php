<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ProfileMaintenance extends Authenticatable
{
    protected $guard = 'profile_maintenance';

    protected $fillable = [
        'email',
        'password',
        'cover',
        'photo',

        'sell_type_id',
        'type_category_id',
        'specialization_id',
        'work_hour',
        'holidays',
        'shopType',


        'city_id',
        'district_id',
        'address',
        'phone1',
        'phone2',
        'facebook',
        'twitter',
        'instgram',
        'email',
        'password',
        'name',
        'description',
    ];
    public function city()
    {
        return $this->belongsTo('App\models\City','city_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function selltype(){
        return $this->belongsTo(SellType::class,'sell_type_id');
    }

    public function typecategory(){
        return $this->belongsTo(TypeCategory::class,'type_category_id');
    }
    public function specialization(){
        return $this->belongsTo(Specialization::class,'specialization_id');
    }
 /*   public function shopType(){
        return $this->belongsTo(ShopType::class,'shopType');
    }*/
}
