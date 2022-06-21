<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'facebook',
        'twitter',
        'instgram',
        'city_id'
    ];
    public function city(){
        return $this->belongsTo(City::class,'city_id');
    }
}
