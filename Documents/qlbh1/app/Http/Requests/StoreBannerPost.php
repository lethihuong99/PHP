<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerPost extends FormRequest
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
            'title'=> 'required|unique:banners,title|max:100|min:3',
            'photoBanner' => 'required|mimes:jpeg,bmp,png,jpg'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Tên banner không được để trống',
            'title.unique' => 'Tên banner đã tồn tại, vui lòng chọn tên khác',
            'title.max' => 'Tên banner không vượt quá :max ký tự',
            'title.min' => 'Tên banner phải nhiều hơn :min ký tự',
            'photoBanner.required' => 'Trường này không được để trống',
            'photoBanner.mimes' => 'Định dạng banner là ảnh: jpeg,bmp,png,jpg'
        ];
    }
}
