<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\LinhVuc;
use App\CauHoi;
use App\Http\Requests\LinhVucRequest;
class LinhVucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $linhVucs=LinhVuc::all();
        //$trash=DB::table('linh_vucs')->whereNotNull('deleted_at')->get();
        //return view('LinhVuc/ds-linhvuc',['linhVucs'=>$linhVucs,'trash'=>$trash]);
        //$linhVucs=DB::table('linh_vucs')->get();
        return view('LinhVuc/ds-linhvuc', compact('linhVucs'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('LinhVuc/them-moi-linh-vuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(LinhVucRequest $request)
    {
        $linhVuc= new LinhVuc;
        $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
        $linhVuc->save();
        return redirect()->route('linh-vuc.danh-sach')
        ->with('thong-bao','Thêm mới lĩnh vực thành công');
    }
    //public function check(Request $Request)
    //{
        //$validatedData = $request->validate([
        //'ten_linh_vuc' => 'required',
        //]);
    //}

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
        $linhVuc =LinhVuc::find($id);
        return view('LinhVuc/update-linh-vuc', compact('linhVuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LinhVucRequest $request, $id)
    {
        $linhVuc =LinhVuc::find($id);
        $linhVuc->ten_linh_vuc=$request->ten_linh_vuc;
        $linhVuc->save();
        return redirect()->route('linh-vuc.danh-sach')
        ->with('thong-bao','Cập nhật lĩnh vực thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $linhVuc= LinhVuc::findOrFail($id);
            $xoaCauHoi= CauHoi::where('linh_vuc_id',$id)->delete();
            $xoaLinhVuc=$linhVuc->delete();
            if($xoaLinhVuc){
                return redirect()->route('linh-vuc.danh-sach');
            }
             return redirect()->route('linh-vuc.danh-sach');
         }catch(Exception $e){
            return redirect()->route('linh-vuc.danh-sach');
        }
    }
    public function trashList()// Danh Sách đã xóa
    {
        $trashLinhVuc=LinhVuc::onlyTrashed()->get();
        return view('LinhVuc/trash-linh-vuc',compact('trashLinhVuc'));
    }
    public function restore($id)// Khôi phục
    {
        $linhVuc=LinhVuc::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('linh-vuc.danh-sach')
        ->with('thong-bao','Khôi phục lĩnh vực thành công');
        //try {
            //$id=$request->id;
            //$linhVuc=LinhVuc::onlyTrashed()->findOrFail($id);
            //$khoiPhucDSCauHoi=CauHoi::onlyTrashed()->where('delete_at',$linhVuc->delete_at)->restore();
            //$khoiPhucLinhVuc=$linhVuc->restore();
            //if($khoiPhucLinhVuc && $khoiPhucDSCauHoi){
                //return redirect()->route('linh-vuc.danh-sach');
            //}
            //return redirect()->route('linh-vuc.danh-sach');
        //}catch(Exception $e){
            //return redirect()->route('linh-vuc.danh-sach');
        //}
    }
}
