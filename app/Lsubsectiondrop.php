<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsubsectiondrop extends Model
{
    //

    protected $fillable =
        [

            'lsubsection_id',
            'option',
            'value'

        ];

    public function lsubsection(){

        return $this->belongsTo('App\Lsubsection');

    }
}
