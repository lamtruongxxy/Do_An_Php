<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LinhVuc;

class LinhVucAPI extends Controller
{
    public function layDanhSach()
    {
    	// $listLinhVuc =LinhVuc::all();
    	// $result=[
    	// 	'success' => true,
    	// 	'data'    => $listLinhVuc,
    	// ];
    	// return response()->json($result);
    	$dem = LinhVuc::count();
		if( $dem > 5)
		{
			$listLinhVuc =LinhVuc::all()->random(5);
		}
		else
		{
			$listLinhVuc =LinhVuc::all()->random($dem);
		}
		$result=[
    		'success' => true,
			'data'    => $listLinhVuc,
			'message' =>' Load danh sách lĩnh vực thành công'
		];
		return response()->json($result);
    }
}
