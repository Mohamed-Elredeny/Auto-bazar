<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard = 'user';
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'company_name',
        'jurisdiction',
        'shopType',
        'register_type',
        'phone',
        'facebook',
        'twitter',
        'instgram',
        'cover',
        'photo',
        'city_id',
        'subscription_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\models\City','city_id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
