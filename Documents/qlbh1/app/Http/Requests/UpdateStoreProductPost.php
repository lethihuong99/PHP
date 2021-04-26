<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class UpdateStoreProductPost extends FormRequest
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
    public function rules(Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        return [
            'product_id' =>'|numeric|required|unique:products,product_id,' .$id,
            'name' => 'required|max:180',
            'price' => 'required',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'images' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'product_id.required' => 'Mã sản phẩm không được để trống',
            'product_id.unique' => 'Mã sản phẩm là duy nhất',
            'product_id.numeric' =>' Mã sản phẩm phải là số ',
            'name.required' => 'Tên sản phẩm không được trống',
            'name.max' => 'Tên sản phẩm không vượt quá  :max ký tự',
            'price.required' => 'Giá sản phẩm không được trống',
            'quantity.required' => 'Số lượng sản phẩm không được trống',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số',
            'category_id.required' => 'Hãy chọn danh mục sản phẩm',
            'category_id.numeric' => 'ID của danh mục phải là số',
            'brand_id.required' => 'Hãy chọn thương hiệu sản phẩm',
            'brand_id.numeric' => 'ID thương hiệu sản phẩm phải là số',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',

        ];
    }
}
