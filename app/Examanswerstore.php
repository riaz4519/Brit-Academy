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

    public function exams(){

        return $this->belongsTo('App\Exam');


    }


    public function users(){

        $this->belongsTo('App\User');
    }

    public function listeningPoints(){

        return $this->hasMany('App\Listeningpoint');

    }

    public function ReadingPoints(){

        return $this->hasMany('App\Readingpoint');

    }
    public function writingPoints(){

        return $this->hasMany('App\Writingpoint');

    }



}
