<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucAPI extends Controller
{
    public function layDanhSach()
    {
    	$listLinhVuc =LinhVuc::all();
    	$result=[
    		'success' => true;
    		'data'    => $listLinhVuc;
    	];
    	return response()->json($result);
    }
}
