<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pourosava extends Model
{
    public function district(){
        return $this->belongsTo(District::class);
    }
}
