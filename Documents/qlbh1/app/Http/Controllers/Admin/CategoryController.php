<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateStoreBrandPost;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Http\Requests\StoreCategoriesPost;
use App\Http\Requests\EditCategories;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index(){
        $categories= Category::orderBy('id')->paginate(5);
        return view('admin.category.list',compact('categories'));
    }
    public function create(){

        return view('admin.category.create');
    }
    public function store(StoreCategoriesPost $request){
        $name = $request->title;
        $slug = Str::slug($name, '-');
        $description= $request->description;
        $dataInsert = Category::create([
            'name' => $name,
            'slug' => $slug,
            'description' => $description,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);

        if($dataInsert){
            $request->session()->flash('success', 'Thêm mới thành công');
        } else {
            $request->session()->flash('error', 'Thêm mới thất bại');
        }
        return redirect(route('admin.category.index'));
    }
    public function edit(Request $request, Category $category){
        //lấy dữ liệu ứng với đối tượng Category truyền tham số $category
        return view('admin.category.edit', compact('category'));
    }
    public function update(EditCategories $request,Category $category ){
        $name = $request->title;
        $slug = Str::slug($name, '-');
        $description = $request->description;
        $status= $request->status;
        if ($category->update([
                        'name' => $name,
                        'slug' => $slug,
                        'description' => $description,
                        'status' => $status,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => null
        ])) {
            Alert::success('Cập nhật thành công!');
            return redirect()->route('admin.brand.index');
        }
//        Alert::error('Cập nhật thất bại!');
//        return redirect()->route('admin.brand.edit',$category->id);

        return redirect(route('admin.category.index'));
    }
        public function destroy(Category $category){
            if($category->products()->count())
            {
                Alert::error('Bạn không được phép xóa');
            }
            else if ($category->delete()) {
                Alert::success('Xóa thành công!');
            } else {
                Alert::error('Xóa không thành công');
            }
            return redirect()->route('admin.category.index');

        }

    public function search()
    {
        $categories = Category::where('name', 'like', '%' . request()->search . '%')
            ->paginate(5);
        return view('admin.category.list')->with('categories', $categories);
    }
}
