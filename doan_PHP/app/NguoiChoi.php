<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Authenticatable implements JWTSubject
{
    use SoftDeletes;
    
    protected $table='nguoi_chois';

    protected $hidden = ['mat_khau'];

    //Tao Attribute moi co ten là password
    public function getPasswordAttribute()
    {
    	return $this->mat_khau;
    }
    public function getJWTIdentifier()
    {
    	return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
    	return [];	
    }
}
