<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Bill;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\District;
use App\Model\Product;
use App\Model\Province;
use App\Services\ProductService;
use App\Traits\InventoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DistrictController extends Controller
{
    public function list()
    {
        $provinceId = request()->province_id;
        if (isset($provinceId)) {
            $districts = Province::findOrFail($provinceId)->districts;
        }else {
            $districts = District::all();
        }
        return response()->json([
            'districts' => $districts,
        ], 200);
    }
}
