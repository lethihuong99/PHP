<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStoreBrandPost extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'nameBrand' => 'required|max:100|unique:brands,name,'.request()->brand->id,
            'descBrand' => 'required'
        ];

    }


    public function messages()
    {
        return [
            'nameBrand.required' => 'Tên thương hiệu không được để trống',
            'nameBrand.max' => 'Tên thương hiệu không vượt quá :max kí tự',
            'nameBrand.unique' => 'Tên thương hiệu đã tồn tại',
        ];
    }
}
