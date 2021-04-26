<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class StoreTagPost extends FormRequest
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
            'title' => 'required|max:100|unique:tags,title',
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
