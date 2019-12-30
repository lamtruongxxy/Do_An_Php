<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\NguoiChoi;
use Illuminate\Support\Facades\Hash;
class NguoiChoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsNguoiChois=NguoiChoi::all();
        return view('NguoiChoi/ds-nguoichoi',compact('dsNguoiChois'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('NguoiChoi/them-moi-nguoi-choi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function maHoa(Request $request)
    //{
        //return Hash::make($request->mat_khau);
    //}

    public function store(Request $request)
    {
        $nguoiChoi= new NguoiChoi;
        $nguoiChoi->ten_dang_nhap = $request->ten_dang_nhap;
        $nguoiChoi->mat_khau = Hash::make($request->mat_khau);
        $nguoiChoi->email = $request->email;
        $nguoiChoi->hinh_dai_dien = $request->hinh_dai_dien;
        $nguoiChoi->diem_cao_nhat = $request->diem_cao_nhat;
        $nguoiChoi->credit = $request->credit;
        $nguoiChoi->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoiChoi =NguoiChoi::find($id);
        return view('NguoiChoi/update-nguoi-choi', compact('nguoiChoi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nguoiChoi = NguoiChoi::find($id);

        $nguoiChoi->ten_dang_nhap=$request->ten_dang_nhap;
        $nguoiChoi->mat_khau=$request->mat_khau;
        $nguoiChoi->email=$request->email;
        $nguoiChoi->hinh_dai_dien=$request->hinh_dai_dien;
        $nguoiChoi->diem_cao_nhat=$request->diem_cao_nhat;
        $nguoiChoi->credit=$request->credit;
        $nguoiChoi->save();

        return redirect()->route('nguoi-choi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoiChoi = NguoiChoi::findOrFail($id);
        

        $xoaNguoiChoi = $nguoiChoi->delete();
        if($xoaNguoiChoi){
            return redirect()->route('cau-hoi.danh-sach');
        }
            return redirect()->route('cau-hoi.danh-sach');
    }
    public function trashList()// Danh Sách đã xóa
    {
        $trashNguoiChoi=NguoiChoi::onlyTrashed()->get();
        return view('NguoiChoi/trash-nguoi-choi',compact('trashNguoiChoi'));
    }
    public function restore($id)// Khôi phục
    {
        $nguoiChoi=NguoiChoi::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('nguoi-choi.danh-sach');
    }
}
