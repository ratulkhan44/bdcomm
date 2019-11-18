<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    public function upazillas()
    {
        return $this->hasManyDeep('App\Upazilla', ['App\PermanentAddress', 'App\District', 'App\Division']);
    }

    public function permanentaddress()
    {
    	return $this->hasOne('App\PermanentAddress');
    }

    public function presentaddress()
    {
    	return $this->hasOne('App\PresentAddress');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function smss()
    {
        return $this->hasMany('App\Sms');
    }
}