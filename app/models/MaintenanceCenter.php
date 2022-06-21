<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MaintenanceCenter extends Model
{
    protected $table = 'profile_maintenances';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        '',
    ];
}
