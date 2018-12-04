<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Readinganswer extends Model
{
    //

    protected $fillable =
        [

            'readingpoint_id',

            'rquestion_id',

            'answer'
        ];

    public function readingPoint(){

        return $this->belongsTo('App\Readingpoint');

    }
}
