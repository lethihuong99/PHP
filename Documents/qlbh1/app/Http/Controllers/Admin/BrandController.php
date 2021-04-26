<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use voku\helper\AntiXSS;
use App\Http\Requests\StoreBrandPost;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreBrandPost;
use App\Model\Brand;
class BrandController extends Controller
{
    const LIMITED_ROW =5;
    public function index(Request $request, AntiXSS $antiXSS)
    {
        $data =[];
        $data['listBrands'] = DB::table('brands')
        ->paginate(self::LIMITED_ROW);
        return view('admin.brand.list',$data);
    }
    public function create()
    {
        return view('admin.brand.create');
    }
    public function store(StoreBrandPost $request,AntiXSS $xss)
    {
        $nameBrand = $request->nameBrand;
        $nameBrand = $xss->xss_clean($nameBrand);
        $slug =Str::slug($nameBrand,'-');
        $descBrand = $request->descBrand;

        $insert = DB::table('brands')->insert([
            'name' => $nameBrand,
            'slug' => $slug,
            'description' => $descBrand,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
         ]);
         
         if($insert){
            Alert::success('Cập nhật thành công!');
            return redirect(route('admin.brand.index'));
         } else {
            Alert::error('Cập nhật thất bại!');
            return redirect(route('admin.brand.create'));
         }
    }
    public function edit(Request $request, Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(UpdateStoreBrandPost $request,Brand $brand)
    {
        $nameBrand = $request->nameBrand;
        $descBrand = $request->descBrand;
        $slug =Str::slug($nameBrand,'-');
        $status = $request->status;
        if ($brand->update([
            'name' => $nameBrand,
            'slug' => $slug,
            'description' => $descBrand,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ])) {
            Alert::success('Cập nhật thành công!');
            return redirect()->route('admin.brand.index');
        }
        Alert::error('Cập nhật thất bại!');
        return redirect()->route('admin.brand.edit',$brand->id);

    }

    public function destroy(Brand $brand)
    {
        if($brand->products()->count())
        {
            Alert::error('Bạn không được phép xóa');
        }
        else if ($brand->delete()) {
            Alert::success('Xóa thành công!');
        }
        else {
                Alert::error('Xóa không thành công!');
        }
        return redirect()->route('admin.brand.index');
    }

    public function search()
    {
        $listBrands = Brand::where('name', 'like', '%' . request()->search . '%')
        ->paginate(self::LIMITED_ROW);
        return view('admin.brand.list')->with('listBrands', $listBrands);
    }

}
