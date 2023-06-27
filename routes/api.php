<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostCategoryController;
use App\Http\Controllers\API\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('posts',PostController::class);
Route::apiResource('categories',CategoryController::class);

Route::post('posts/{post}/categories', [PostCategoryController::class, 'store']);
Route::delete('posts/{post}/categories/{category}', [PostCategoryController::class,'destroy']);

Route::get('posts/search', [PostController::class, 'search']);
