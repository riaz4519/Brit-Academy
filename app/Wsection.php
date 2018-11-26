<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wsection extends Model
{

    protected $fillable = [

        'title',
        'body',
        'writing_id',


    ];

    public function writing(){

        return $this->belongsTo('App\Writing');


    }




}
