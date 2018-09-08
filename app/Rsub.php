<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsub extends Model
{
    //

    public function rsections(){

        return $this->belongsTo('App\Rsection');
    }

    public function type(){

        return $this->belongsTo('App\type');
    }

    public function rquestions(){

        return $this->hasMany('App\Rquestion','rsub_id');

    }
}
