<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;

class CauHoiAPI extends Controller
{
    // public function layDanhSachCauHoi() 
    // {
    //     $dsCauHoi = CauHoi::all();
    //     $ketqua = [
    //             'success' => true,
    //             'data'    => $dsCauHoi,
    //         ];
    //         return response()->json($ketqua);
    // }

    // public function layMotCauHoi($id)
    // {
    //     $dsCauHoi = CauHoi::find($id);
    //     $ketqua = [
    //             'success' => true,
    //             'data'    => $dsCauHoi,
    //         ];
    //         return response()->json($ketqua);
    // }
     public function cauHoiTheoLinhVuc($id)
    {
        $cauhois=CauHoi::where('linh_vuc_id',$id)->get();
        if (count($cauhois) === 0)
        {
            $res = [
                'success'   => false,
                'msg'       => 'Không tìm thấy câu hỏi tương ứng'
            ];
            return response()->json($res);
        }
        $res = [
            'success'   => true,
            'msg'       => 'Tải câu hỏi thành công',
            'data'      => $cauhois
        ];
        return response()->json($res);
    }
}
