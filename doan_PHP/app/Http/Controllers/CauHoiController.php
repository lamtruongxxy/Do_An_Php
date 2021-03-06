<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;
use App\Http\Requests\CauHoiRequest;
class CauHoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsCauHoi=CauHoi::all();
        $dsLinhVuc=LinhVuc::all();
        return view('CauHoi/ds-cauhoi',compact('dsCauHoi','dsLinhVuc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CauHoiRequest $request)
    {
        $dsCauHoi = new CauHoi;

        $dsCauHoi->noi_dung=$request->noi_dung;

        $dsCauHoi->linh_vuc_id=$request->linh_vuc;

        $dsCauHoi->phuong_an_a=$request->phuong_an_a;

        $dsCauHoi->phuong_an_b=$request->phuong_an_b;

        $dsCauHoi->phuong_an_c=$request->phuong_an_c;

        $dsCauHoi->phuong_an_d=$request->phuong_an_d;

        $dsCauHoi->dap_an=$request->dap_an;

        $dsCauHoi->save();

        return redirect()->route('cau-hoi.danh-sach')
        ->with('thong-bao','Thêm mới câu hỏi thành công');
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
        $dsCauHoi =CauHoi::find($id);
        $dsLinhVuc=LinhVuc::all();
        return view('CauHoi/update-cau-hoi', compact('dsCauHoi','dsLinhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CauHoiRequest $request, $id)
    {
        $dsCauHoi =CauHoi::find($id);
        
        $dsCauHoi->noi_dung=$request->noi_dung;

        $dsCauHoi->linh_vuc_id=$request->linh_vuc;

        $dsCauHoi->phuong_an_a=$request->phuong_an_a;

        $dsCauHoi->phuong_an_b=$request->phuong_an_b;

        $dsCauHoi->phuong_an_c=$request->phuong_an_c;

        $dsCauHoi->phuong_an_d=$request->phuong_an_d;

        $dsCauHoi->dap_an=$request->dap_an;

        $dsCauHoi->save();

        return redirect()->route('cau-hoi.danh-sach')
        ->with('thong-bao','Cập nhật câu hỏi thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cauHoi=CauHoi::findOrFail($id);
        $xoaCauHoi=$cauHoi->delete();
        if($xoaCauHoi)
            return redirect()->route('cau-hoi.danh-sach');
        return redirect()->route('cau-hoi.danh-sach');

    }
    public function trashList()// Danh Sách đã xóa
    {
        $trashCauHoi=CauHoi::onlyTrashed()->get();
        return view('CauHoi/trash-cau-hoi',compact('trashCauHoi'));
    }
    public function restore($id)// Khôi phục
    {
        $cauHoi=CauHoi::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('cau-hoi.danh-sach')
        ->with('thong-bao','Khôi phục câu hỏi thành công');
    }
}
