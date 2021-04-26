<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Bill;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\District;
use App\Model\Product;
use App\Model\Province;
use App\Model\Ward;
use App\Services\ProductService;
use App\Traits\InventoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class WardController extends Controller
{
    public function list()
    {
        $districtId = request()->district_id;
        if (isset($districtId)) {
            $wards = District::findOrFail($districtId)->wards;
        }else {
            $wards = Ward::all();
        }
        return response()->json([
            'wards' => $wards,
        ], 200);
    }
}
