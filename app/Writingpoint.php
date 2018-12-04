<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writingpoint extends Model
{
    //

    protected $fillable =
        [

            'examanswerstore_id',


        ];

    public function writingAnswer(){

        return $this->hasMany('App\Writinganswer');
    }
}
