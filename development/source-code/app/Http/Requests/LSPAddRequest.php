<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LSPAddRequest extends FormRequest
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
            'txt_tenloai_them'=>'required|unique:loaisp,TenLoai',
            'txt_maloai_them'=>'required|unique:loaisp, MaLoai'
        ];
    }

    public function messages (){
        return[
        'txt_tenloai_them.required' => 'Vui lòng nhập tên loại sản phẩm!']
    }
}
