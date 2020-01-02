<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CauHoiRequest extends FormRequest
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
            "noi_dung"      => "required|unique:cau_hois,noi_dung",
            
            "phuong_an_a"   =>"required",
            "phuong_an_b"   =>"required",
            "phuong_an_c"   =>"required",
            "phuong_an_d"   =>"required",
        ];
    }
    public function messages()
    {
        return [
            "noi_dung.required"     =>"Nội dung để trống",
            "noi_dung.unique"       =>"Nội dung đã tồn tại",
            
            "phuong_an_a.required"  =>"Phương án a trống",
            "phuong_an_b.required"  =>"Phương án b trống",
            "phuong_an_c.required"  =>"Phương án c trống",
            "phuong_an_d.required"  =>"Phương án d trống",
        ];
    }
}
