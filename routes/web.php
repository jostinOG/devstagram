<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});
// Routes for registering a user
Route::get('/createAccount', [RegisterController::class, 'index'])->name('register');
Route::post('/createAccount', [RegisterController::class, 'store']);

// Routes for login a user
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// Routes for log out a user
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Routing of user profiles (Index)
Route::get('/{user:username}', [PostController::class, 'index'])->name('posts.index');
//Create a posts the Instagram (Create)
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
//Save a post in the database (Store);
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//Upload Image
Route::post('/images', [ImageController::class, 'store'])->name('images.store');
//display a specific publication
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
//Save a comment on a specific publications
Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
//destroy a specific publications
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//like a specific publications
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes.destroy');
