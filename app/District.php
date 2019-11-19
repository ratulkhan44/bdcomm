<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name','division_id'
    ];
    public function division()
    {
        return $this->belongsTo('App\Divison');
    }
    public function upazillas()
    {
        return $this->hasMany(Upazilla::class);
    }
    public function pourasavas()
    {
        return $this->hasMany(Pourosava::class);
    }
}
