<?php

namespace App\Http\Controllers;

use App\User;
use App\Category;
use Storage;
use Auth;
use Validator;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Post $post)
    {
        return view('posts/posts')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);
    }
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    public function store (Request $request, Post $post)
    {
        $post->title = $request->post_title;
        $post->body = $request->post_body;
        $post->user_id = Auth::id();
        $post->category_id = $request->category_id;
        if($request->file('image') === null){
        }else{
        //s3アップロード開始
        $image = $request->file('image');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('post', $image, 'public');
        // アップロードした画像のフルパスを取得
        $post->image = Storage::disk('s3')->url($path);
        };
        $post->save();
        
        return redirect('/posts');
    }
    public function home(Post $post)
    {
        return view('posts/posts')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
