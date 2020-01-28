<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //


    public function league(){

        return $this->hasMany('App\League');
    }
}
