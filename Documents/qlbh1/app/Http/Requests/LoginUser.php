<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUser extends FormRequest
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
            'email' => 'required|max:60',
            'password' => 'required|max:60'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => ' không được để trống',
            'password.r' => 'Tên banner đã tồn tại, vui lòng chọn tên khác',
            'title.max' => 'Tên banner không vượt quá :max ký tự',
            'title.min' => 'Tên banner phải nhiều hơn :min ký tự',
            'photoBanner.required' => 'Trường này không được để trống',
            'photoBanner.mimes' => 'Định dạng banner là ảnh: jpeg,bmp,png,jpg'
        ];
    }
}
