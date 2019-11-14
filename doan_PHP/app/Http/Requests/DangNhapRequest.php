<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ten_dang_nhap' =>'required',
            'mat_khau'      => 'required|min:6'
        ];
    }
     public function messages(){
            return[
                'ten_dang_nhap.required' => 'Chưa nhập tên đăng nhập ',
                'mat_khau.required'      => 'Chưa nhập mật khẩu ',
                'mat_khau.min'           => 'Mật khẩu ít nhất 6 ký tự'
            ];
        }
}
