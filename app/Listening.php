<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listening extends Model
{
    //

    protected $fillable =
        [

            'title',
            'description',
            'duration',
            'audio'
        ];

    public function lsections(){

        return $this->hasMany('App\Lsection');

    }
    public function exam(){

        return $this->hasOne('App\Exam','listening_id');
    }

}
