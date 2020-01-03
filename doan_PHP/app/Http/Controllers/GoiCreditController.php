<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GoiCredit;
use App\Http\Requests\GoiCreditRequest;

class GoiCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goiCredits=GoiCredit::all();
        //$trash=DB::table('goi_credits')->whereNotNull('deleted_at')->get();
        //return view('GoiCredit/ds-goicredit',['goiCredits'=>$goiCredits,'trash'=>$trash]);
        //$goiCredits=DB::table('goi_credits')->get();
        return view('GoiCredit/ds-goicredit', compact('goiCredits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('GoiCredit/them-moi-goidredit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoiCreditRequest $request)
    {
        $goiCredit= new GoiCredit;

        $goiCredit->ten_goi=$request->ten_goi;

        $goiCredit->credit=$request->credit;

        $goiCredit->so_tien=$request->so_tien;

        $goiCredit->save();
        
        return redirect()->route('goi-credit.danh-sach')->
        with('thong-bao','Thêm mới gói credit thành công');
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
        $goiCredit =GoiCredit::find($id);
        return view('GoiCredit/update-goicredit', compact('goiCredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoiCreditRequest $request, $id)
    {
        $goiCredit =GoiCredit::find($id);

        $goiCredit->ten_goi=$request->ten_goi;

        $goiCredit->credit=$request->credit;

        $goiCredit->so_tien=$request->so_tien;

        $goiCredit->save();
        
        return redirect()->route('goi-credit.danh-sach')->
        with('thong-bao','Cập nhật gói credit thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $goiCredit=GoiCredit::findOrFail($id);
        $xoaGoiCredit=$goiCredit->delete();
        if($xoaGoiCredit){
            return redirect()->route('goi-credit.danh-sach');
        }
        return redirect()->route('goi-credit.danh-sach');
    }
    public function trashList()// Danh Sách đã xóa
    {
        $trashGoiCredit=GoiCredit::onlyTrashed()->get();
        return view('GoiCredit/trash-goi-credit',compact('trashGoiCredit'));
    }
    public function restore($id)// Khôi phục
    {
        $goiCredit=GoiCredit::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('goi-credit.danh-sach')->
        with('thong-bao','Khôi phục gói credit thành công');;
    }
}
