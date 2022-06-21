<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    protected $table = 'advertisements';

    protected $fillable = [
            'version',
            'advCat',
            'advName',
            'advDetails',
            'advLink',
            'advFullType',
            'advYear',
            'advGear',
            'advMark',
            'advCondition',
            'advSlinder',
            'advEngineCapacity',
            'image',
    ];
    public $timestamps = false;
    public function mark(){
        return $this->belongsTo(Make::class,'advMark');
    }
    public function status(){
        return $this->belongsTo(Status::class,'advCondition');
    }
}
