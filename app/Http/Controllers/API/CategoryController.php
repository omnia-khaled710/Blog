<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $category=Category::all();
        return $category;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
      $category= new Category;
      $category->name=$request->name;

      $category->save();
      return response()->json(['message'=>'created successfully','category'=>$category],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category=Category::find($id);
        return response()->json(['message'=>'success','category'=>$category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category=Category::find($id);

        $category->name=$request->name;
        $category->save();

        return response()->json(['message'=>'updated successfully','category'=>$category],204);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category = category::find($id);
        $category->delete();
        return response()->json(['message'=>'deleted successfully'],202);
    }
}
