<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateStoreTagPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'title' => 'required|max:100|unique:tags,title,'.request()->tag->id,
            'description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên tag không được để trống',
            'title.max' => 'Tên tag không lớn hơn :max ký tự',
            'title.unique' => 'Tên Tag đã tồn tại',
            'description.required'=>"Trường này không được để trống",
        ];
    }

}
