<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    protected  $fillable = ['title','image','description','course_id'];


    public function course(){

        return $this->belongsTo('App\Course');
    }

    public function exams(){

        return $this->belongsToMany('App\Exam')->withTimestamps();
    }
}
