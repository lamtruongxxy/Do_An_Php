<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LuotChoi;
use App\ChiTietLuotChoi;
class LuotChoiAPI extends Controller
{
    public function chiTietLuotChoi(Request $request)
    {
        $listChiTiet = ChiTietLuotChoi::all();
    	$result=[
    		'success' => true,
    		'data'    => $listChiTiet,
    	];
    	return response()->json($result);
    }

    public function luuLuotChoi (Request $request)
	{
		$luotChoi = [
            'nguoi_choi_id'  => $request->nguoi_choi_id,
            'so_cau'         => $request->so_cau,
            'diem'     		 => $request->diem
        ];
    $kq = LuotChoi::create($luotChoi);
    if(!$kq)
    {
        $res = [
            'success'	=> false,
            'msgg'		=> 'Lưu lượt chơi thất bại'
        ];
        return response()->json($res);
    }
    $res = [
            'success'	=> true,
            'msg'		=> 'Lưu lượt chơi thành công'
        ];
        return response()->json($res);
	}
}
