<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsection extends Model
{
    //

    protected $fillable =
        [
            'listening_id',
            'section_number',
            'start',
            'end'

        ];


    public function listenings(){

        return $this->belongsTo('App\Listening');

    }

    public function lsubsections(){

        return $this->hasMany('App\Lsubsection');

    }
}
