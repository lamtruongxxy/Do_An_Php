<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\QuanTriVien;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DangNhapRequest;
class QuanTriVienConTroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listQuanTriVien = QuanTriVien::all();
        view('partials/navigation',compact('listQuanTriVien'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    public function dangNhap()
    {
        return view('Login/dang-nhap');
    }

     public function xyLydangNhap(DangNhapRequest $request)
    {
        //Bao-Loi
        //Xy-ly dang nhap
        $thongTin = $request->only(['ten_dang_nhap','mat_khau']);
        if(Auth::attempt(['ten_dang_nhap'=>$thongTin['ten_dang_nhap'],
         'password'=>$thongTin['mat_khau']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('thong-bao',' Đăng nhập thất bại');
    }

     public function xyLydangXuat(Request $request)
     {
        Auth::logout();
        return redirect()->route('dang-nhap');
     }

     protected $redirectTo='index';
     protected function redirectTo()
     {
        return 'index';
     }
}
