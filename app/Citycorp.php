<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citycorp extends Model
{
    protected $fillable = [
        'name','division_id'
    ];
    
    public function division(){
        return $this->belongsTo(Division::class);
    }
}
