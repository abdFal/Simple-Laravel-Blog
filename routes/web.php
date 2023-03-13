<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});


Route::get('hello', [HelloController::class, 'index']);
Route::get('landing', [HelloController::class, 'landing']);
Route::get('world', [HelloController::class, 'worldmsg']);
Route::get('makan', [MyController::class, 'index']);

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/create', [PostController::class, 'create']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{id}', [PostController::class, 'show']);
Route::get('posts/{id}/edit', [PostController::class, 'edit']);
Route::patch('posts/{id}', [PostController::class, 'update']);

