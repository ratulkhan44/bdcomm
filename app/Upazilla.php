<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    public function district(){
        return $this->belongsTo(District::class);
    }
}
