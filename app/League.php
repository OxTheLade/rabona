<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //
    protected $fillable = [
        'name',
        'country_id',
        'cl_spots',
        'cl_qual',
        'el_spots',
        'el_qual'

    ];

    public function country(){


        return $this->belongsTo('App\Country');
    }

    public function teams(){

        return $this->hasMany('App\Team');
    }
}
