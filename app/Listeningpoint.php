<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listeningpoint extends Model
{
    //

    protected $fillable =
        [

            'examanswerstore_id',
            'point',

        ];


    /*this is for the relation with exam ans store*/

    public function examAnswerStore(){

        return $this->belongsTo('App\Examanswerstore');

    }


    /*this  for the relation with reading answer*/

    public function listeningAnswers(){

        return $this->hasMany('App\Listeninganswer');
    }

}
