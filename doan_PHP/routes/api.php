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
Route::post('dang-ky','API\LoginController@dangKy');

Route::middleware(['assign.guard:api','jwt.auth'])->group(function(){

    //lay thong người dùng đăng nhập
    Route::get('lay-thong-tin','API\LoginController@layThongTin');

    //lay danh sach linh vuc
    Route::get('linh-vuc','API\LinhVucAPI@layDanhSach');

    //Lấy danh sách câu hỏi
    Route::get('cau-hoi','API\CauHoiAPI@layDanhSachCauHoi');
 
    //Lấy câu hỏi theo id
    Route::get('cau-hoi/{id}','API\CauHoiAPI@layMotCauHoi');

    Route::prefix('goi-credit')->group(function(){
        //Lấy danh sách gói credit
        Route::get('/','API\GoiCreditAPI@danhSachGoiCredit');

        //Lấy danh sách gói credit theo id
        Route::get('/{id}','API\GoiCreditAPI@goiCreditTheoID');

        //Mua gói credit
        Route::post('/mua-goi','API\GoiCreditAPI@muaGoiCredit');
    });
    Route::prefix('luot-choi')->group(function(){

        //Load lượt chơi theo id người chơi
        Route::get('/{id}','API\LuotChoiAPI@loadLuotChoiTheoIdNguoiChoi');

        //Load all Ds Chi Tiet Luot Choi
        Route::get('/chi-tiet','API\LuotChoiAPI@chiTietLuotChoi');

        Route::post('/luu','API\LuotChoiAPI@luuLuotChoi');
    });

});

Route::prefix('nguoi-choi')->group(function(){

    //Lay toan bộ danh sách người chơi 
    Route::get('/','API\NguoiChoiAPI@layAllDSNguoiCHoi'); 

    //Lay toàn bộ danh sách người chơi xếp hạng theo điểm giảm dần
    Route::get('/xep-hang','API\NguoiChoiAPI@layDanhSachXepHang');

    //Lay 1 người chơi theo id
    Route::get('/{id}','API\NguoiChoiAPI@layMotNguoiChoi');
});



