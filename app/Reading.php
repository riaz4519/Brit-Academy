<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reading extends Model
{
    //


    protected $fillable = [
        'title',
        'description',
        'status',
        'course_id'

    ];


    public function rsections(){

        return $this->belongsToMany('App\Rsection');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function exam(){
        return $this->hasOne('App\Exam','reading_id');
    }

}
