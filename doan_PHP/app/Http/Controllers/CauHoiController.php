<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CauHoi;
use App\LinhVuc;
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
        $dsLinhVuc=LinhVuc::all();
        return view('CauHoi/them-moi-cau-hoi',compact('dsLinhVuc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        return redirect()->route('cau-hoi.danh-sach');
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
    public function update(Request $request, $id)
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

        return redirect()->route('cau-hoi.danh-sach');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
