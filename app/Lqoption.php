<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lqoption extends Model
{
    //

    protected $fillable =
        [
            'lquestion_id',
            'option',
            'value',
        ];


    public function question(){

        return $this->belongsTo('App\Lquestion');

    }
}
