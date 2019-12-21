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

    Route::prefix('nguoi-choi')->group(function(){
    //Lay toan bộ danh sách người chơi    
    Route::get('/','API\NguoiChoiAPI@layAllDSNguoiCHoi'); 
    
    //Lay toàn bộ danh sách người chơi xếp hạng theo điểm giảm dần
    Route::get('/xep-hang','API\NguoiChoiAPI@layDanhSachXepHang');

    //Lay 1 người chơi theo id
    Route::get('/{id}','API\NguoiChoiAPI@layMotNguoiChoi');
    });

    Route::get('cau-hoi','API\CauHoiAPI@layDanhSachCauHoi');

    //lay danh sach linh vuc
    Route::get('linh-vuc','API\LinhVucAPI@layDanhSach');

});



