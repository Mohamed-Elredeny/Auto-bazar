<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class MaintMark extends Model
{
    protected $table = 'maint_marks';

    protected $fillable = [
        'maint_Id',
        'mark_id',
    ];
    public function mark(){
        return $this->belongsTo(Make::class,'mark_id');
    }
    public $timestamps = false;
}
