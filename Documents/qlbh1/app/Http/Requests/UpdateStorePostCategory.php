<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateStorePostCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'title' => 'required|unique:post_categories,title,'.request()->postCategory->id,
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' =>'Tên danh mục không được để trống',
            'title.unique' => 'Tên danh mục đã tồn tại vui lòng chọn tên khác',
            'description.required'=>"Trường này không được để trông",
        ];
    }
}
