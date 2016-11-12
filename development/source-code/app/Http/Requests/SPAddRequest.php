<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SPAddRequest extends FormRequest
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
            'txt_masp'=>'required',
            'txt_tensp'=>'required',
            'txt_mota'=>'required',
            'txt_giaban'=>'required',
            'txt_giaban_hientai'=>'required',
            'txt_soluong'=>'required',
            'txt_nsx'=>'required',
            'txt_soluong'=>'required',
            'txt_tinhtrang'=>'required'

        ];
    }
}
