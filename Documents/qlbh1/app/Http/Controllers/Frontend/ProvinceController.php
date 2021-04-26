<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Bill;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use App\Model\Province;
use App\Services\ProductService;
use App\Traits\InventoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinceController extends Controller
{
    public function list()
    {
        return response()->json([
            'provinces' => Province::all(),
        ], 200);
    }
}
