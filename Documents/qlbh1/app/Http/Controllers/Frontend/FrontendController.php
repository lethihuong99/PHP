<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d H:i:s');
        $yesterday = date('Y-m-d H:i:s', strtotime('-30days'));
        $pagination = request()->pagination ?? config('app.pagination');
        $orderType = request()->order_type ?? '';
        //khong để mặc định
        $newProducts = DB::table('products')
            ->where('status', Product::ACTIVE)
            ->whereBetween('created_at', [$yesterday, $today]);
        
        if ($orderType) {
            $newProducts->orderBy('price', $orderType);
        }
        $newProducts = $newProducts->paginate($pagination);
        return view('frontend.home.index', compact('newProducts'));
    }
}
