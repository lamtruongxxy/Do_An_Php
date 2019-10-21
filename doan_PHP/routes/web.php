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

Route::get('/', function () {
    return view('layout');

})->name('dashboard');
//-------LINH_VUC
Route::prefix('linh-vuc')->group(function(){
	Route::name('linh-vuc.')->group(function(){
		Route::get('/','LinhVucController@index')->name('danh-sach');

		Route::get('/them-moi','LinhVucController@create')->name('them-moi');
		Route::post('/them-moi','LinhVucController@store')->name('post-them-moi');	

		Route::get('/cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
		Route::post('/cap-nhat/{id}','LinhVucController@update')->name('xl-cap-nhat');
	
	});	
});
//------GOI_CREDIT
Route::prefix("goi-credit")->group(function(){
	Route::name("goi-credit.")->group(function(){
		Route::get('/','GoiCreditConTroller@index')->name('danh-sach');

		Route::get('/them-moi','GoiCreditConTroller@create')->name('them-moi');
		Route::post('/them-moi','GoiCreditConTroller@store')->name('post-them-moi');
	});
});
//------GOI_CAUHOI
Route::prefix("cau-hoi")->group(function(){
	Route::name("cau-hoi.")->group(function(){
		Route::get('/danh-sach','CauHoiController@index')->name('danh-sach');

		Route::get('/them-moi','CauHoiController@create')->name("them-moi");
		Route::post('/them-moi','CauHoiController@store')->name("post-them-moi");
	
	});
});

//Kiem tra xem view ds-nguoichoi hien thi dc ko
/* Route::get('/nguoi-choi', function(){
	return view('NguoiChoi/ds-nguoichoi');
});*/



Route::prefix("nguoi-choi")->group(function(){
	Route::name("nguoi-choi.")->group(function(){
		Route::get('/danh-sach','NguoiChoiController@index')->name('danh-sach');	
	});
});








