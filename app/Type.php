<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //

    public function rsubs(){

        return $this->hasMany('App\Rsub');

    }

    public function rquestions(){

        return $this->hasMany('App\Rquestion');
    }
}
