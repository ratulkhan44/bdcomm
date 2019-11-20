<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    public function clients()
    {
        return $this->belongsToMany('App\Client');
    }

    public function text() {
        return $this->belongsTo('App\Text');
    }
}
