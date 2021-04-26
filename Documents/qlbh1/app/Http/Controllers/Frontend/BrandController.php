<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function getProductBelongBrand(){
        return view('frontend.cart.index');
    }
}
