<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\PostCategory;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTagPost;
use App\Model\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreTagPost;
use RealRashid\SweetAlert\Facades\Alert;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->paginate(5);;
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(StoreTagPost $request, Tag $tag)
    {
        $data = $request->all();
        $data['slug'] = Str::slug(request()->title);
        if (Tag::create($data)) {
            Alert::success('Thêm mới thành công!');
        } else {
            Alert::error('Thêm mới không thành công!');
        }
        return redirect()->route('admin.tag.index');
    }

    public function edit(Request $request, Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateStoreTagPost $request, Tag $tag)
    {
        $data = $request->all();
        $data['slug'] = Str::slug(request()->title);
        if ($tag->update($data)) {
            Alert::success('Cập nhật thành công!');
        } else {
            Alert::error('Chưa cập nhật được!');
        }
        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            Alert::success('Xóa thành công!');
        } else {
            Alert::error('Xóa không thành công!');
        }
        return redirect()->route('admin.tag.index');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $tags = Tag::where('title', 'like', '%' . '$search' . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->paginate(5);

        return view('admin.tags.index', compact('tags'));
    }
}
