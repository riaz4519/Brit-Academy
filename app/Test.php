<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    protected  $fillable = ['title','image'];

    public function courses(){

        return $this->belongsToMany('App\Course');

    }
}
