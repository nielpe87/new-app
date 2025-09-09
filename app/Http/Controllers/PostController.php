<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        $user = "Emanuel";
        return view('posts.index',compact('posts', 'user'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index');
    }

    public function edit(Post $post){
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post){

        $post->title = $request->title;
        $post->description = $request->description;
        $post->update();

        return redirect()->route('posts.index');
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }
}
