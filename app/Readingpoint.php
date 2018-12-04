<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Readingpoint extends Model
{
    //

    protected $fillable =
        [

            'examanswerstore_id',
            'point'

        ];

    public function examAnswerStore(){

        return $this->belongsTo('App\Examanswerstore');
    }

    public function readingAnswers(){

        $this->hasMany('App\Readinganswer');
    }
}
