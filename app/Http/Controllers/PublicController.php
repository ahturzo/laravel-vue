<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('public.index');
    }

    public function allCategory()
    {
        return response()->json(Category::all(), 200);
    }

    public function allBlog()
    {
        return response()->json(Post::with('category')->with('user')->get(), 200);
    }

    public function blogDetails($id)
    {
        return response()->json(Post::with('user')->with('category')->where('id', $id)->first(), 200);
    }

    public function blogSearch()
    {
        $search = \Request::get('s');
        $post = Post::where('title', 'Like', '%$search%')->orWhere('description', 'Like', "%$search%")->with('user')->with('category')->get();
        return response()->json($post, 200);
    }
}
