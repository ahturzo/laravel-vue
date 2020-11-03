<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $all = Post::with('user')->with('category')->get();
        return response()->json(['allPost' => $all], 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'         => ['required', 'string'],
            'description'   => ['required', 'string'],
            'category_id'   => ['required', 'integer'],
            'content'       => ['required', '']
        ]);
        if($data)
        {
            return Category::create([
                'name'      => $data['name']
            ]);
        }
    }
}
