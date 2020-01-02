<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinhVucRequest extends FormRequest
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
            "ten_linh_vuc" => "required|min:4|max:20|unique:linh_vucs,ten_linh_vuc",
        ];
    }
    public function messages(){
        return [
            "ten_linh_vuc.required" => "Tên lĩnh vực trống",
            "ten_linh_vuc.min" =>"Lĩnh vực phải hơn 3 ký tự trở lên",
            "ten_linh_vuc.max" =>"Lĩnh vực không quá là 20 ký tự ",
            "ten_linh_vuc.unique" =>"Lĩnh vực đã tồn tại",
        ];
    }
}
