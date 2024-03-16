<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {return view('welcome');});
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth']);
Route::get("/posts/removeOld",[PostController::class,"removeOldPosts"]);

Route::group(['middleware' =>['auth']], function(){

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/restore/{post}', [PostController::class, 'restore'])->name('posts.restore');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');

    Route::post('/posts/{post}/comment', [CommentController::class,"store"])->name("comments.store");
    Route::get('/users', [UserController::class, 'index'])->name('users.index');


});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/github/redirect',[PostController::class,'githubredirect'])->name('githublogin');
Route::get('/auth/github/callback',[PostController::class,'githubcallback']);

Route::get('/auth/google/redirect',[PostController::class,'googleredirect'])->name('googlelogin');
Route::get('/auth/google/callback',[PostController::class,'googlecallback']);
