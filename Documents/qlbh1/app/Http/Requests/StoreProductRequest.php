<?php

namespace App\Http\Requests;

class StoreProductRequest extends ProductRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|unique:products,product_id|numeric',
            'name' => 'required|max:180',
            'price' => 'required|numeric|digits_between:1,10',
            'discount' => 'nullable|numeric|digits_between:0,10',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'images' => 'required',
            'summary' => 'required',
            'description' => 'required'
        ];
    }
}
