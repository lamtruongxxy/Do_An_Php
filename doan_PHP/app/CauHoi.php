<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
	protected $table='cau_hois';
    //
    public function LinhVuc()
    {
    	return $this->belongsTo('App\LinhVuc');
    }
}
