<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $post = new Post;

            $post->title = $request->title;
            $post->description = $request->description;
            $post->save();

            return response()->json($post, 201);
        } catch (\Throwable $th) {

            Log::error('Error creating post: ' . $th->getMessage());
             $data = [
                'error' => true,
                'message' => 'Post not found',
                'status' => 500,
                'code' => 1398
            ];

            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $post = Post::findOrFail($id);
            return response()->json($post);

        } catch (\Throwable $th) {
            $data = [
                'error' => true,
                'message' => 'Post not found',
                'status' => 404,
                'code' => 1092
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $post = Post::findOrFail($id);

            $post->title = $request->title;
            $post->description = $request->description;
            $post->update();

            return response()->json($post);
        } catch (\Throwable $th) {
            $data = [
                'error' => true,
                'message' => 'Post not updeted',
                'status' => 500,
                'code' => 109232
            ];

            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Post::find($id)->delete();

            return response()->json([
                'message' => 'Post excluido'
            ]);
        } catch (\Throwable $th) {
             $data = [
                'error' => true,
                'message' => 'Post not deleted',
                'status' => 500,
                'code' => 323232
            ];

            return response()->json($data, 500);
        }
    }
}
