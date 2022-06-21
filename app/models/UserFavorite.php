<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model
{
    protected $table = 'user_favorites';

    protected $fillable = [
        'user_id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
