<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingChargeRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateShippingChargeRequest;
use App\ShippingCharge;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingChargeController extends Controller
{
    public function getFee()
    {
        $provinceId = request()->province_id;
        $districtId = request()->district_id;
        $wardId = request()->ward_id;
        if ($provinceId && $districtId && $wardId) {
            $shippingCharge = ShippingCharge::where('province_id', $provinceId)
                ->where('district_id', $districtId)
                ->where('ward_id', $wardId)->first();
            $fee = $shippingCharge ? $shippingCharge->fee : ShippingCharge::DEFAULT_FEE;
            $formattedFee = number_format($fee) . ' ₫';
            return response()->json([
                'fee' => $fee,
                'formattedFee' => $formattedFee,
            ], 200);
        }
        return response()->json([
            'fee' => ShippingCharge::DEFAULT_FEE,
            'formattedFee' => ShippingCharge::DEFAULT_FEE . ' ₫',
        ], 200);
    }
}
