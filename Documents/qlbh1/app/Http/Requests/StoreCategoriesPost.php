<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriesPost extends FormRequest
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
            'title' => 'required|max:100|unique:categories,name',
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên danh mục không được để trống',
            'title.max' => 'Tên danh mục không lớn hơn :max ký tự',
            'title.unique' => 'Ten danh mục đã tồn tại',
            'description.required'=>"Trường này không được để tr",
        ];
    }
}
