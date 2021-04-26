<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdmin extends FormRequest
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
            'username'=>'required',
            'password'=>'required',
            'email'=>'required',
            'fullname'=>'required',
            'address'=>'required',
            'birthday'=>'required',
      
            'role'=>'required',
            'status'=>'required',
            'number'=>'required|numeric|max:10',
        ];
    }
    public function messages()
    {
        return[
            'username.required'=>'usernam không được để trống',
            'password.required'=>'password không được để trống',
            'email.required'=>'email không được để trống',
            'fullname.required'=>'họ và tên không được để trống',
            'address.required'=>'địa chỉ không được để trống',
            'birthday.required'=>'ngày sinh không được để trống',
            'number.required'=>'Số điện thoại không được để trống',
            'number.numeric'=>'Số điện thoại phải đúng định dạnh số',
            'number.max'=>'Số điện thoại không được nhỏ hơn 10 ký tự',
        ];
    }
}
