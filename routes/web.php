<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/



Route::get('/', [PostController::class, 'main'])->name('main');
Route::get('posts', [PostController::class, 'index'])->name('index');
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts', [PostController::class, 'store']); 
Route::get('posts/trash', [PostController::class, 'trash']);
Route::get('posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{slug}/edit', [PostController::class, 'edit']);
Route::patch('posts/{slug}', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{id}', [PostController::class, 'destroy']);
Route::delete('posts/{id}/permanent', [PostController::class, 'permanent_delete']);
Route::delete('posts/{id}/restore', [PostController::class, 'restore']);
Route::post('posts/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('posts/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');



