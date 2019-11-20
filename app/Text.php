<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    public function campaign() {
        return $this->hasOne('App\Campaign');
    }
}
