<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CauHoi;

class CauHoiAPI extends Controller
{
    public function layDanhSachCauHoi() 
    {
        $dsCauHoi = CauHoi::all();
        $ketqua = [
                'success' => true,
                'data'    => $dsCauHoi,
            ];
            return response()->json($ketqua);
    }

    public function layMotCauHoi($id)
    {
        $dsCauHoi = CauHoi::find($id);
        $ketqua = [
                'success' => true,
                'data'    => $dsCauHoi,
            ];
            return response()->json($ketqua);
    }
}
