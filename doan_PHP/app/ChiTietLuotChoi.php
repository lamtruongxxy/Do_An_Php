<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLuotChoi extends Model
{
    protected $table='chi_tiet_luot_chois';

    public function cauHoi()
    {
        return $this->belongsTo('App\CauHoi');
    }

    //public function aai()
    //{
       // return $this->belongsTo("App\CauHoi");
    //}
}
