<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'status',
        'course_id'
    ];

    public function course(){

        return $this->belongsTo('App\Course');

    }

    public function wsections(){
        return $this->hasMany('App\Wsection');
    }
}
