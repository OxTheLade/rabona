<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'name',
        'league_id',
        'points',
        'photo_id'
    ];


    public function league(){


        return $this->belongsTo('App\League');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }
}
