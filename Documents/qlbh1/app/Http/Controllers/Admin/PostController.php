<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePost;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
use App\Model\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Model\Tag;
use App\Model\PostCategory;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query();

        $searchKeyword = request()->search;
        if ($searchKeyword) {
            $posts->where('title', 'like', "%$searchKeyword%");
        }
        $posts = $posts->orderBy('updated_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::where('status', Tag::ACTIVE)->get();
        $postCategories = PostCategory::where('status', PostCategory::ACTIVE)->get();
        return view('admin.posts.create', compact('tags', 'postCategories'));

    }

    public function store(StorePost $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['slug'] = Str::slug(request()->title);
            $arrImages = [];
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                foreach ($image as $key => $i) {
                    if ($i->isValid()) {
                        $nameImage = $i->getClientOriginalName();
                        $i->move('uploads/images/posts', $nameImage);
                        $arrImages[] = $nameImage;
                    }
                }
            }
            if ($arrImages) {
                $data['image'] = array_pop($arrImages);
            }
            $post = Post::create($data);
            $post->tags()->sync($data['tag_ids']);
            DB::commit();
            Alert::success('Thành công!');
        } catch (\Exception $exception) {
            Alert::error('Thất bại!');
            DB::rollBack();
        }
        return redirect()->route('admin.post.index');
    }

    public function edit(Request $request, Post $post)
    {
        $tags = Tag::where('status', Tag::ACTIVE)->get();
        $postCategories = PostCategory::where('status', PostCategory::ACTIVE)->get();
        return view(
            'admin.posts.edit',
            compact('post', 'tags', 'postCategories')
        );
    }

    public function update(UpdatePost $request, Post $post)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['slug'] = Str::slug(request()->title);
            $arrImages = [];
            if ($request->hasFile('images')) {
                $image = $request->file('images');
                foreach ($image as $key => $i) {
                    if ($i->isValid()) {
                        $nameImage = $i->getClientOriginalName();
                        $i->move('uploads/images/posts', $nameImage);
                        $arrImages[] = $nameImage;
                    }
                }
            }
            if ($arrImages) {
                $data['image'] = array_pop($arrImages);
            }
            $post->update($data);
            $post->tags()->sync($data['tag_ids']);
            DB::commit();
            Alert::success('Thành công!');
        } catch (\Exception $exception) {
            Alert::error('Thất bại!');
            DB::rollBack();
        }
        return redirect()->route('admin.post.index');
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            Alert::success('Thành công!');
        } else {
            Alert::error('Thất bại!');
        }
        return redirect()->route('admin.post.index');
    }
}
