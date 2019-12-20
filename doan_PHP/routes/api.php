<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('dang-nhap','API\LoginController@dangNhap');

Route::middleware(['assign.guard:api','jwt.auth'])->group(function(){

    //lay thong người dùng đăng nhập
    Route::get('lay-thong-tin','API\LoginController@layThongTin');

    //lay danh sach nguoi choi
    Route::get('nguoi-choi','API\NguoiChoiAPI@layDanhSach');

    //lay danh sach linh vuc
    Route::get('linh-vuc','API\LinhVucAPI@layDanhSach');
});



