<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Post $post)
    {
        $post=Post::all();
        return $post;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json(['message'=>'created successfully','post'=>$post],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $post = Post::find($id);
        return $post->categories;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        $post = Post::find($id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return response()->json(['message'=>'updated successfully','new post'=> $post],204);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        return response()->json(['message'=>'deleted successfully'],202);

    }


        public function search(Request $request)
        {
            $query = $request->query('q');
            $posts = Post::where('title', 'like', "%{$query}%")
                         ->orWhere('content', 'like', "%{$query}%")
                         ->get();

            return response()->json($posts);
        }
    

}
