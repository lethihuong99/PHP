<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoginAdminPost extends FormRequest
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
     * Gt the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|max:60',
            'password' => 'required|max:60'
        ];
    }
    public function messages()
    {
        // thong bao loi ra ngoai view
        return [
            'username.required' => 'Username không được để trống ',
            'username.max' => 'Username tối đa không quá:max ký tự',
            'password.required' => 'Password không được để trống',
            'password.max' => 'Password tối đa không quá :max ký tự'
        ];
    }
}
