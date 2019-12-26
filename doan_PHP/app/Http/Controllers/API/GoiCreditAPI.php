<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GoiCredit;
class GoiCreditAPI extends Controller
{
    public function danhSachGoiCredit()
    {
        $dsGoiCredit = GoiCredit::all();
        $ketqua = [
            'success' => true,
            'data'    => $dsGoiCredit
        ];
        return response()->json($ketqua);
    }

    public function goiCreditTheoID($id)
    {
        $dsGoiCredit = GoiCredit::find($id);
        $ketqua = [
            'success' => true,
            'data'    => $dsGoiCredit
        ];
        return response()->json($ketqua);
    }

    public function muaGoiCredit(Request $request)
    {
        $goiCredit =GoiCredit::where('id',$request->id)->get();
        if($goiCredit)
        {
            $credit = 0;
            foreach($goiCredit as $goi)
            {
                $credit = $goi->credit;
            }
            $ketqua = [
                'success' => true,
                'message' => 'Mua gói credit thành công',
                'data'    => $credit
            ];
            return response()->json($ketqua);
        }
        $ketqua = [
            'success' => false,
            'message' => 'Mua gói credit thất bại'
        ];
        return response()->json($ketqua);      
    }
}
