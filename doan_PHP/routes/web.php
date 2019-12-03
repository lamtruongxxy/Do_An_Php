<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function(){
//	return view('Login/login');
//});

Route::get('/','QuanTriVienController@dangNhap')-> name('dang-nhap')->middleware("guest");
Route::post('dang-nhap','QuanTriVienController@xyLydangNhap')->name('xu-ly-dang-nhap');
Route::get('dang-nhap','QuanTriVienController@xyLydangXuat')-> name('xu-ly-dang-xuat');



Route::middleware('auth')->group(function()
{
	//-Linh Vuc
	Route::get('/index','InDex@index')->name('dashboard');
	Route::prefix('linh-vuc')->group(function(){
		Route::name('linh-vuc.')->group(function(){
			Route::get('/','LinhVucController@index')->name('danh-sach');
			Route::post('/them-moi','LinhVucController@store')->name('post-them-moi');	
			Route::get('/cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
			Route::post('/cap-nhat/{id}','LinhVucController@update')->name('xl-cap-nhat');
			Route::delete('/xoa/{id}','LinhVucController@destroy')->name('xoa');
			Route::get('/trash-list','LinhVucController@trashList')->name('trash');
			Route::get('/khoi-phuc/{id}','LinhVucController@restore')->name('restore');	
		});	
	});

	//------GOI_CAUHOI
	Route::prefix("cau-hoi")->group(function(){
	Route::name("cau-hoi.")->group(function(){
		Route::get('/danh-sach','CauHoiController@index')->name('danh-sach');

		Route::get('/them-moi','CauHoiController@create')->name("them-moi");
		Route::post('/them-moi','CauHoiController@store')->name("post-them-moi");

		Route::get('/cap-nhat/{id}','CauHoiController@edit')->name('cap-nhat');
		Route::post('/cap-nhat/{id}','CauHoiController@update')->name('xl-cap-nhat');

		Route::delete('/xoa/{id}','CauHoiController@destroy')->name('xoa');
		Route::get('/trash-list','CauHoiController@trashList')->name('trash');

		Route::get('/khoi-phuc/{id}','CauHoiController@restore')->name('restore');	
	
	});
});

	//--NguoiChoi
Route::prefix("nguoi-choi")->group(function(){
	Route::name("nguoi-choi.")->group(function(){
		Route::get('/danh-sach','NguoiChoiController@index')->name('danh-sach');

		Route::get('/them-moi','NguoiChoiController@create')->name("them-moi");
		Route::post('/them-moi','NguoiChoiController@store')->name("post-them-moi");

		Route::get('/cap-nhat/{id}','NguoiChoiController@edit')->name('cap-nhat');
		Route::post('/cap-nhat/{id}','NguoiChoiController@update')->name('xl-cap-nhat');

		Route::delete('/xoa/{id}','NguoiChoiController@destroy')->name('xoa');
		Route::get('/trash-list','NguoiChoiController@trashList')->name('trash');
		
		Route::get('/khoi-phuc/{id}','NguoiChoiController@restore')->name('restore');		
	});
});

//------GOI_CREDIT
Route::prefix("goi-credit")->group(function(){
	Route::name("goi-credit.")->group(function(){
		Route::get('/','GoiCreditConTroller@index')->name('danh-sach');

		Route::get('/them-moi','GoiCreditConTroller@create')->name('them-moi');
		Route::post('/them-moi','GoiCreditConTroller@store')->name('post-them-moi');

		Route::get('/cap-nhat/{id}','GoiCreditController@edit')->name('cap-nhat');
		Route::post('/cap-nhat/{id}','GoiCreditController@update')->name('xl-cap-nhat');

		Route::delete('/xoa/{id}','GoiCreditController@destroy')->name('xoa');
		Route::get('/trash-list','GoiCreditController@trashList')->name('trash');
		
		Route::get('/khoi-phuc/{id}','GoiCreditController@restore')->name('restore');
	});
});

});









