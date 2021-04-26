<?php

namespace App\Http\Controllers\Admin;

use App\Model\CartProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $searchKeyword = trim(request()->search_keyword);
        $products = Product::query();
        if ($searchKeyword) {
            $products->where('name', 'like', "%$searchKeyword%")
                ->orWhereHas('category', function ($query) use ($searchKeyword) {
                    $query->where('name', 'like', "%$searchKeyword%");
                });
        }
        $products = $products->latest()->paginate(10);
        return view('admin.products.index')->with('products', $products);
    }

    public function create()
    {
        $categories = Category::where('status', Category::ACTIVE)->get();
        $brands = Brand::where('status', Category::ACTIVE)->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->all();
        $imageName = '';
        if ($request->hasFile('images')) {
            $image = $request->file('images')[0];
            if ($image->isValid()) {
                $imageName = $image->getClientOriginalName();
                $image->move('uploads/images/products', $imageName);
            }
        }
        unset($data['images']);
        $data['image'] = $imageName;
        $data['slug'] = Str::slug($data['name']);
        $isInserted = Product::create($data);
        if ($isInserted) {
            Alert::success('Thêm thành công');
            return redirect()->route('admin.product.index');
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.product.store');
        }
    }

    public function edit(Request $request, Product $product)
    {
        $categories = Category::where('status', Category::ACTIVE)->get();
        $brands = Brand::where('status', Category::ACTIVE)->get();
        return view(
            'admin.products.edit',
            [
                'product' => $product,
                'categories' => $categories,
                'brands' => $brands
            ]
        );
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->all();
        $imageName = '';
        if ($request->hasFile('images')) {
            $image = $request->file('images')[0];
            if ($image->isValid()) {
                $imageName = $image->getClientOriginalName();
                $image->move('uploads/images/products', $imageName);
            }
        }
        unset($data['images']); 
        if ($imageName) {
            $data['image'] = $imageName;
        }
        $data['slug'] = Str::slug($data['name']);
        $isUpdated = $product->update($data);
        if ($isUpdated) {
            Alert::success('Cập nhật thành công');
            return redirect()->route('admin.product.index');
        } else {
            Alert::error('Cập nhật thất bại');
            return redirect()->back();
        }
    }

    public function destroy(Product $product)
    {
        $isPurchased = CartProduct::where('product_id', $product->id)->exists();
        if ($isPurchased) {
            Alert::error('Bạn không thể xóa vì sản phẩm đã được mua !!');
            return back();
        }
        $product->delete();
        Alert::success('Xóa thành công');
        return back();
    }

   /*  public function search()
    {
        $products = Product::where('name', 'like', '%' . request()->search . '%')
            ->get();
        return view('admin.products.index')->with('products', $products);
    } */

}
