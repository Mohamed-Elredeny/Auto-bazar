<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $table = 'makes';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'sell_type_id',
        'image',
    ];

    public function sellType()
    {
        return $this->belongsTo('App\models\SellType','sell_type_id');
    }
}
