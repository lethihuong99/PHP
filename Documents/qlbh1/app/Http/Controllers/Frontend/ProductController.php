<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('frontend.product.detail');
    }

    public function getProductsBelongCategory()
    {
        $products = Category::findOrFail(request()->id)->products;
        return view(
            'frontend.products.list',
            [
                'products' => $products
            ]
        );
    }

    public function getProductsBelongBrand()
    {
        $products = Brand::findOrFail(request()->id)->products;
        return view(
            'frontend.products.list',
            [
                'products' => $products
            ]
        );
    }

    public function show()
    {
        $selectedProduct = Product::findOrFail(request()->id);
        $relatedProducts = Category::findOrFail($selectedProduct->category_id)
            ->products
            ->except(['id' => $selectedProduct->id]);
        return view(
        'frontend.products.show',
        [
            'product' => $selectedProduct,
            'relatedProducts' => $relatedProducts
        ]
    );
    }
    public function getSearch(){
        $products = Product::where('name','like','%'.request()->search.'%')
            ->get();
        return view('frontend.products.list')->with('products',$products);
    }
}
