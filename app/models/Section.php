<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    protected $fillable = [
        'Title_ar',
        'Title_en',
        'Title_ku',
        'sell_type_id',
    ];

    public function sellType()
    {
        return $this->belongsTo('App\models\SellType','sell_type_id');
    }
}
