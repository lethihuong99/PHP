<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandPost extends FormRequest
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
            'nameBrand' => 'required|max:100|unique:brands,name',
            'descBrand' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'nameBrand.required' =>'Tên thương hiệu không được để trống',
            'nameBrand.max'=>'Ten thương hiệu không vượt quá :max ký tự',
            'nameBrand.unique'=>'Tên thương hiệu đã tồn tại',
            'descBrand.required'=>"Mô tả về thương hiệu không được để trống",
        ];
    }
}
