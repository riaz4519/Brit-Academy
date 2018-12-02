<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Examwritingstore extends Model
{
    //

    protected $fillable =
        [

            'examanswerstore_id',
            'answer',
            'wsection_id'
        ];

    public function examanswerstore(){

        return $this->belongsTo('App\Examanswerstore');

    }
}
