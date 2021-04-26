<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class EditCategories extends FormRequest
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
    public function rules(Request $request )
    {
        return [
            'title' => 'required|max:100|unique:categories,name,'.request()->category->id,
            'description' => 'required',
        ];
//        $id = $request->id;
//        $id = is_numeric($id) && $id > 0 ? $id : 0;
//        return [
//            'title' => 'required|max:100|unique:categories,name,'.$id,
//            'description' => 'required',
//        ];
    }
    public function messanges()
    {
        return [
            'title.required' => 'Tên danh mục không được để trống',
            'title.max' => 'Tên danh mục không lớn hơn :max ký tự',
            'title.unique' => 'Ten danh mục đã tồn tại, vui lòng nhập lại ',
            'description.required'=>"Trường này không được để trông",
        ];
    }
}
