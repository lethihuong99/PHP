<?php

namespace App\Http\Requests;

class UpdateProductRequest extends ProductRequest
{
    public function rules()
    {
        return [
            'product_id' => 'required|unique:products,product_id,' . $this->product->id . ',id|numeric',
            'name' => 'required|max:180|unique:products,name,' . $this->product->id . ',id',
            'price' => 'required | numeric | digits_between:1,10',
            'discount' => 'nullable | numeric | digits_between:0,10',
            'quantity' => 'required | numeric',
            'category_id' => 'required | numeric',
            'brand_id' => 'required | numeric',
            'summary' => 'required',
            'description' => 'required'
        ];
    }
}
