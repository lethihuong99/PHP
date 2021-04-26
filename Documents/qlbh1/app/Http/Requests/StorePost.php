<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|unique:posts,title',
            'description' => 'required',
            'images' => 'required',
            'quote' => 'required',
            'tag_ids' => 'required',
            'post_category_id' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Trường này không được để trống ',
            'description.required' => 'Trường này không được để trống',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
            'quote.required' => 'Truong nay khong duoc de trong',
            'tag_ids' => 'Trường này không được để trống',
            'post_category_id' => 'Trường này không được để trống',
            'status.required' => 'Trường này không được để trống'
        ];
    }
}
