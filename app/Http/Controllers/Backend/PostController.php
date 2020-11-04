<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
            'content'       => ['required']
        ]);
        if($data)
        {
            $semipos = strpos($data['content'],';');
            $sub = substr($data['content'],0,$semipos);
            if (strpos($sub, 'image') !== false) {
                $image = $data['content']; // image base64 encoded
                preg_match("/data:image\/(.*?);/",$image,$image_extension); // extract the image extension
                $image = preg_replace('/data:image\/(.*?);base64,/','',$image); // remove the type part
                $image = str_replace(' ', '+', $image);
                $imageName = 'Dev_Purpose/BlogByMaria/'.time() . '.' . $image_extension[1]; //generating unique file name;
                Storage::disk('do')->put($imageName,base64_decode($image), 'public');
                $data['type'] = "image";
                $data['content'] = $imageName;
            }
            elseif (strpos($sub, 'video') !== false) {
                $video = $data['content'];
                preg_match("/data:video\/(.*?);/",$video,$image_extension); // extract the image extension
                $video = preg_replace('/data:video\/(.*?);base64,/','',$video); // remove the type part
                $video = str_replace(' ', '+', $video);
                $videoName = 'Dev_Purpose/BlogByMaria/'.time() . '.' . $image_extension[1]; //generating unique file name;
                Storage::disk('do')->put($videoName,base64_decode($video), 'public');
                $data['type'] = "video";
                $data['content'] = $videoName;
            }
            else{
                return response()->json(['message' => 'Content must be a image or video!!!'], 404);
            }
            $data['user_id'] = Auth::user()->id;
            return Post::create($data);
        }
    }

    public function edit(Post $post)
    {
        return $post;
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'         => ['required', 'string'],
            'description'   => ['required', 'string'],
            'category_id'   => ['required', 'integer']
        ]);
        if($data)
        {
            $change = array();

            if($data['title'] != $post->title)
                $change['title'] = $data['title'];

            if($data['category_id'] != $post->category_id)
                $change['category_id'] = $data['category_id'];

            if($data['description'] != $post->description)
                $change['description'] = $data['description'];

            if(sizeof($change) == 0)
                return response()->json(['message' => 'Nothing to change'], 422);
            else
                return Post::where('id', $post->id)->update($change);
        }
    }

    public function destroy($id)
    {
        $file = Post::find($id);
        if($file->content)
            $file = Storage::disk('do')->delete($file->content);
        if($file)
            Post::destroy($id);
        else
            return response()->json(['message' => 'Error deleting post'], 500);
    }
}
