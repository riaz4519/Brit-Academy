<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listeninganswer extends Model
{
    //

    protected $fillable =
        [

            'liteningpoint_id',
            'lquestion_id',
            'answer'

        ];

    public function listeningPoint(){

        return $this->belongsTo('App\Listeningpoint');
    }


}
