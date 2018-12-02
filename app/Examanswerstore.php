<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examanswerstore extends Model
{
    //


    protected  $fillable =
        [

            'user_id',
            'exam_id',


        ];

    public function examwritingstores(){


        return $this->hasMany('App\Examwritingstore');

    }
    public function exams(){

        return $this->belongsTo('App\Exam');


    }

    public function users(){

        $this->belongsTo('App\User');
    }
}
