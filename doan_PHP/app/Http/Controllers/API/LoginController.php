<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\NguoiChoi;

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
    			'message' => 'Đăng nhập không thành công '// khong dươc phép
    		], 401);
    	}
    	// chứng thực thành công
    	return response()->json([
    		'status'  => true,
    		'message' =>'Đăng nhập thành công',
    		'token'   => $token,
    		'type'    => 'bearer', //có thể bỏ
    		'expires' => auth('api')->factory()->getTTL() * 30
    	], 200); //có thể bỏ
	}
	
	public function dangXuat()
    {
        auth('api')->logout();
        $res = [
            'success'   => true,
            'msg'       => 'Đăng xuất thành công'
        ];
        return response()->json($res);
	}
	
    public function layThongTin()
    {
    	return auth('api')->user();
	}

	//Dang ki
	public function dangKy(Request $request)
	{
		$validator = Validator::make($request->all(),
		[
			'ten_dang_nhap' => 'required|min:3|unique:nguoi_chois,ten_dang_nhap',
			'mat_khau'      => 'required|min:6|alpha_num',
			'email'         => 'required|email:rfc|unique:nguoi_chois,email'
                
		],
		[
			'ten_dang_nhap.required' =>' Tên đăng nhập trống',
			'ten_dang_nhap.min'      =>' Tên đăng nhập ít nhất 3 ký tự',
			'ten_dang_nhap.unique'   =>' Tên đăng nhập đã tồn tại',

			'mat_khau.required'      =>' Mật khẩu trống',
			'mat_khau.min:6'     	 =>' Mật khẩu ít nhất 6 ký tự',
			'mat_khau.alpha_num'     =>' Mật khẩu chỉ là chữ và số',

			'email.required'		=>' Email trống',
			'email.email'			=>' Không phải là email',
			'email.unique'          =>' Email đã tồn tại'
		]
	);
		if($validator->fails())
		{
			return response()->json(
				[
					'status' => false, 
					'error' => $validator->errors()->first()
				]);
		}
		$nguoiChoi = [
			'ten_dang_nhap' => $request->ten_dang_nhap,
			'mat_khau'      => Hash::make($request->mat_khau),
			'email'         => $request->email,
			'hinh_dai_dien' => '',
			'credit'        => 0,  
			'diem_cao_nhat' => 0
		];
		$kq= NguoiChoi::create($nguoiChoi);
		if($kq)
		{
			return response()->json([
				'status' => true,
				'message' => ' Đăng ký tài khoản thành công',
			]);
		}
		return response()->json([
				'status' => false,
				'message' => ' Đăng ký tài khoản thất bại',
			]); 
	}

	 

	
}
