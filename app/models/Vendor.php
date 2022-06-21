<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Authenticatable
{
    use Notifiable;
    protected $guard  = 'vendor';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone1',
        'phone2',
        'email',
        'facebook',
        'twitter',
        'instgram',
        'company_name',
        'jurisdiction',
        'city_id',
        'district_id',
        'shopType',
        'image',
        'cover'
    ];
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function MyshopType(){
        return $this->belongsTo(ShopType::class,'shopType');
    }

}
