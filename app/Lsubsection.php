<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lsubsection extends Model
{
    //


    protected  $fillable =

        [
            'lsection_id',
            'body',
            'time_start',
            'time_end',
            'start',
            'end',
            'ltype_id'
        ];

    public function ltypes(){

        return $this->belongsTo('App\Ltype','ltype_id');
    }
    public function questions(){

        return $this->hasMany('App\Lquestion');

    }

    public function lsections(){

        return $this->belongsTo('App\Lsection');
    }
    /*for sub section drop down option*/

    public function lsubsectionDrops(){

        return $this->hasMany('App\Lsubsectiondrop');
    }
}
