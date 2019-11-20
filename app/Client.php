<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    public function permanentaddress()
    {
    	return $this->hasOne('App\PermanentAddress');
    }

    public function campaigns()
    {
        return $this->belongsToMany('App\Campaign');
    }

    // no use yet
    public function presentaddress()
    {
    	return $this->hasOne('App\PresentAddress');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    // no use yet
    public function smss()
    {
        return $this->hasMany('App\Sms');
    }
}
