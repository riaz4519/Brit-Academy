<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qoption extends Model
{
    //


    public function rquestion(){

        return $this->belongsTo('App\Rquestion');

    }
}
