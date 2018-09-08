<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rsection extends Model
{
    //


    protected $fillable = ['title','passage','image','starts','end'];

    public function readings(){

        return $this->belongsToMany('App\Reading');

    }
    public function rsubs(){

        return $this->hasMany('App\Rsub');

    }

}
