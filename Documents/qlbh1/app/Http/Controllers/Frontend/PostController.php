<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Post;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\PostCategory;
use App\Model\Tag;
class PostController extends Controller
{
    public function index()
    {
        $posts =Post::where('status', Product::ACTIVE)->paginate(5);
        return view('frontend.posts.list', compact('posts'));
    }
    
    public function show()
    {
        $post = Post::findOrFail(request()->id);

        return view('frontend.posts.show', compact('post'));
    }

}
