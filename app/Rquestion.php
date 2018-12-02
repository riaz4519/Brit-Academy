<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rquestion extends Model
{
    //


    protected $fillable = ['rsub_id','question','number'];
    public function rsubs(){

        return $this->belongsTo('App\Rsub');

    }

    public function type(){

        return $this->belongsTo('App\Type');

    }

    public function answer(){

        return $this->hasOne('App\Answer');

    }

    public function qoptions(){

        return $this->hasMany('App\Qoption');

    }

}
