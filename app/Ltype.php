<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ltype extends Model
{
    //
    protected $fillable =
        [
            'name',
            'description'
        ];

    public function lsubsections(){

        return $this->hasMany('App\Lsubsection');

    }
}
