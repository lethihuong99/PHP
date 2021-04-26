<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:100|unique:post_categories,title',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên danh mục không được để trống',
            'title.max' => 'Tên danh mục không lớn hơn :max ký tự',
            'title.unique' => 'Ten danh mục đã tồn tại',
            'description.required'=>"Trường này không được để trông",
        ];
    }
}
