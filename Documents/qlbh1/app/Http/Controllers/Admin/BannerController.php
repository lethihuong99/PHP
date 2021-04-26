<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Banner;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use voku\helper\AntiXSS;
use App\Http\Requests\StoreBannerPost as BannerPost;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreBannerPost;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('id')->paginate(3);
        return view('admin.banners.index')->with('banners', $banner);
    }

    public function create(Request $request)
    {
        return view('admin.banners.create');
    }

    public function store(BannerPost $request)
    {
        $data = $request->all();
        
        $data['slug'] = Str::slug($data['title']);
        $upload = false;
        $nameFile = null;
        if ($request->hasFile('photoBanner')) {
            if ($request->file('photoBanner')->isValid()) {
                $file = $request->file('photoBanner');
                $nameFile = $file->getClientOriginalName();
                $upload = $file->move('uploads/images/banners', $nameFile);
            }
        }

        if (!$upload || !$nameFile) {
            Alert::error('Không upload được banner');
            return redirect()->route('admin.banner.index');
        }
        $data['photo'] = $nameFile;
        if (Banner::create($data)) {
            Alert::success('Thành công!');
            return redirect()->route('admin.banner.index');
        }
        Alert::error('Thất bại!');
        return redirect()->route('admin.banner.index');
    }

    public function edit(Request $request, Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateStoreBannerPost $request, Banner $banner)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);
        $uploadPhoto = null;
        $newPhoto = null;
        if ($request->hasFile('photoBanner')) {
            if ($request->file('photoBanner')->isValid()) {
                $file = $request->file('photoBanner');
                $newPhoto = $file->getClientOriginalName();
                $uploadPhoto = $file->move('uploads/images/banners', $newPhoto);
            }
        }
        if ($uploadPhoto && $newPhoto) {
            $data['photo'] = $newPhoto;

        }
        if ($banner->update($data)) {
            Alert::success('Cập nhật thành công!');
            return redirect()->route('admin.banner.index');
        }
        Alert::error('Cập nhật hất bại!');
        return redirect()->route('admin.banner.edit', $banner->id);
    }

    public function destroy(Banner $banner)
    {
        if ($banner->delete()) {
            Alert::success('Xóa thành công!');
        } else {
            Alert::error('Xoá không thành công!');
        }
        return redirect()->route('admin.banner.index');
    }

    public function search()
    {
        $banners = Banner::where('title', 'like', '%' . request()->search . '%')
            ->paginate(5);
        return view('admin.banners.index')->with('banners', $banners);
    }
}
