<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    public function tests(){

        return $this->hasMany('App\Test');
    }

    public function exams(){
        return $this->hasMany('App\Exam','course_id');
    }
}
