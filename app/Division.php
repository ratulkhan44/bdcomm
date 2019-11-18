<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function clients()
    {
        return $this->hasManyThrough('App\Client','App\PermanentAddress');
    }
    public function districts(){
        return $this->hasMany(District::class);
    }
    public function citycorporations(){
        return $this->hasMany(Citycorp::class);
    }
}
