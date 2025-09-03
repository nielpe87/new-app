<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        dd($posts[0]->teste());
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){

       $post = new Post;

       $post->title = $request->title;
       $post->description = $request->description;
       $post->save();

    }
}
