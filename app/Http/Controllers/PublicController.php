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
        return response()->json(Post::with('user')->with('category')->where('id', $id), 200);
    }
}
