<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lquestion extends Model
{
    //

    protected $fillable =
        [
            'lsubsection_id',
            'qnumber',
            'question',
            'example'
        ];

    public function answers(){
        return $this->hasOne('App\Lanswer');
    }

    public function lqoptions(){

        return $this->hasMany('App\Lqoption');
    }
}
