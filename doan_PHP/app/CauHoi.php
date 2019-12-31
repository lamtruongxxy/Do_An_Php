<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
	use SoftDeletes;
	protected $table='cau_hois';
    
    public function LinhVuc()
    {
    	return $this->belongsTo('App\LinhVuc');
    }
}
