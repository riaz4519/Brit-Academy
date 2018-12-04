<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writinganswer extends Model
{
    //

    protected $fillable =
        [

            'writingpoint_id',
            'writing_id',
            'passage_1',
            'passage_2',

        ];


    public function writingPoint(){


        return $this->belongsTo('App\Writingpoint');

    }



}
