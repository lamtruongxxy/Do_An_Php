<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoiCreditRequest extends FormRequest
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
            "ten_goi"=>"required|unique:goi_credits,ten_goi",
            "credit"=>"required|unique:goi_credits,credit",
            "so_tien"=>"required|"
        ];
    }
    public function messages()
    {
        return[
           "ten_goi.required" =>"Tên gói trống",
           "ten_goi.unique" =>"Tên gói đã tồn tại",

           "credit.required" =>"Credit trống",
           "credit.unique"=>"Số Credit đã tồn tại",

           "so_tien.required" =>"Số tiền trống",
        ];
    }
}
