<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingChargeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'ward_id.unique' => 'Đã tồn tại phí ship cho phường/xã này',
        ];
    }
}
