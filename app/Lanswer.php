<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lanswer extends Model
{
    //

    protected $fillable =
        [
            'lquestion_id',
            'answer'
        ];
}
