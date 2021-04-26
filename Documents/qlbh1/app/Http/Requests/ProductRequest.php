<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Mã sản phẩm không được để trống',
            'product_id.unique' => 'Mã sản phẩm là duy nhất',
            'product_id.numeric' => ' Mã sản phẩm phải là số ',
            'name.required' => 'Tên sản phẩm không được trống',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'name.max' => 'Tên sản phẩm không vượt quá  :max ký tự',
            'discount.digits_between' => 'Giá trị không hợp lệ',
            'price.required' => 'Giá sản phẩm không được trống',
            'price.numeric' => 'Giá trị không hợp lệ',
            'price.digits_between' => 'Giá trị không hợp lệ',
            'quantity.required' => 'Số lượng sản phẩm không được trống',
            'quantity.numeric' => 'Số lượng sản phẩm phải là số',
            'category_id.required' => 'Hãy chọn danh mục sản phẩm',
            'category_id.numeric' => 'ID của danh mục phải là số',
            'brand_id.required' => 'Hãy chọn thương hiệu sản phẩm',
            'brand_id.numeric' => 'ID thương hiệu sản phẩm phải là số',
            'images.required' => 'Vui lòng nhập ảnh sản phẩm',
            'summary.required' => 'Mô tả vắn tắt không được để trống',
            'description.required' => 'Mô tả không được để trống'
        ];
    }
}
