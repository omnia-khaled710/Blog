<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Post $post)
    {
        $categories = $request->input('categories');
        $post->categories()->sync($categories);

        return response()->json(['message' => 'Categories assigned successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Post $post ,Category $category)
    {
        if (!$post->categories->contains($category)) {
            return response()->json(['message' => 'Post is not assigned to this category'], 404);
        }

        $post->categories()->detach($category);

        return response()->json(['message' => 'Category removed successfully']);
    }
}
