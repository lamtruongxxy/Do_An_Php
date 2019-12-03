<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LinhVuc extends Model
{
	use SoftDeletes;
    protected $table='linh_vucs';
    
    public function dsCauHoi()
    {
    	return $this->hasMany('App\CauHoi');
    }
}
