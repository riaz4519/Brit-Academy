<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //


    protected $fillable = ['name','description'];

    public function course(){

        return $this->belongsTo('App\Course');
    }

}
