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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});

// Authenticate
Route::get('makan', [MyController::class, 'makan']);
Route::get('register', [AuthController::class, 'register_form']);
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);


Route::get('posts', [PostController::class, 'index']); // menampilkan daftar postingan
Route::get('posts/create', [PostController::class, 'create']); // menampilkan formulir untuk membuat postingan
Route::post('posts', [PostController::class, 'store']); // menyimpan postingan baru ke database
Route::get('posts/trash', [PostController::class, 'trash']); // menampilkan daftar postingan yang telah dihapus
Route::get('posts/{slug}', [PostController::class, 'show']); 
Route::get('posts/{slug}/edit', [PostController::class, 'edit']);
Route::patch('posts/{slug}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);
Route::delete('posts/{id}/permanent', [PostController::class, 'permanent_delete']);
Route::delete('posts/{id}/restore', [PostController::class, 'restore']);
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');



