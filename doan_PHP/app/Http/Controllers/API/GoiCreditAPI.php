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

    public function GoiCreditTheoID($id)
    {
        $dsGoiCredit = GoiCredit::find($id);

        $ketqua = [
            'success' => true,
            'data'    => $dsGoiCredit
        ];
        return response()->json($ketqua);
    }

    public function muaGoiCredit (Request $request)
    {
        
    }
}
