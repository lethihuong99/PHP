<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateStoreBannerPost extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules(Request $request)
    {
        return [
            'title' => 'required|max:100|unique:banners,title,'.request()->banner->id,
            'status' => 'required',
            'photoBanner.mimes' => 'Định dạng banner là ảnh: jpeg,bmp,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên banner không được để trống ',
            'title.unique' => 'Tên banner đã tồn tại, vui lòng chọn tên khác',
            'title.max' => 'Tên banner không vượt quá :max ký tự',
            'status.required' => 'Vui lòng chọn banner khác',
            'photoBanner.mimes' => 'Định dạng banner là ảnh: jpeg,bmp,png,jpg'
        ];
    }

}
