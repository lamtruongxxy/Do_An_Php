<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	//Đăng nhập
    public function dangNhap(Request $req)
    {
    	//lay thong tin Nguoi choi cần dùng cho đăng nhập
    	$credentials = [
    		'ten_dang_nhap' => $req->ten_dang_nhap,
    		'password' => $req->mat_khau,
    	];
    	// chứng thực thất bại
    	if(!$token = auth('api')->attempt($credentials))
    	{
    		// nếu sai ten dang nhap hoac mat khau
    		return response()->json([
    			'status'  => false,
    			'message' => 'Unauthorized. '// khong dươc phép
    		], 401);
    	}
    	// chứng thực thành công
    	return response()->json([
    		'status'  => true,
    		'message' =>'Authorized.',
    		'token'   => $token,
    		'type'    => 'bearer', //có thể bỏ
    		'expires' => auth('api')->factory()->getTTL() * 30
    	], 200); //có thể bỏ
    }
    public function layThongTin()
    {
    	return auth('api')->user();
    }
}
