<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';


    protected $fillable = ['path'];


    public function getPathAttribute($photo){

        return $this->uploads . $photo;


    }

    public function getPostDateAttribute($date)
    {
        return Carbon::parse($date);
    }
}
