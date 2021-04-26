<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShippingChargeRequest extends ShippingChargeRequest
{
    public function rules()
    {
        return [
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => [
                'required',
                Rule::unique('shipping_charges')->where(function ($query) {
                    return $query->where('id', '!=', request()->shippingCharge->id)
                        ->where('province_id', request()->province_id)
                        ->where('district_id', request()->district_id)
                        ->where('ward_id', request()->ward_id);
                }),
            ],
            'fee' => 'required|numeric|digits_between:1,10'
        ];
    }
}
