<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdrop extends Model
{
    //

    protected $fillable = ['option','value','rsub_id'];


    public function rsub(){

        return $this->belongsTo('App\Rsub');

    }

}
