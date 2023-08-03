<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TimelineController;


Route::group(['middleware' => ['guest']], function () {
    //only guests can access these routes
    // Route::get('/', [ExploreController::class, 'index'])->name('landing');
    Route::get('/', function(){
        return redirect()->route('explore.index');
    });
});
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/explore', [ExploreController::class, 'index'])->name('explore.index');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');
Route::get('/@{user:username}/{post:id}', [PostController::class, 'show'])->name('post.show');
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/', [TimelineController::class, 'home'])->name('home');
    Route::post('/', [PostController::class, 'store'])->name('publish.post');
    Route::post('/{user:username}/follow', [UserController::class, 'follow'])->name('follow');
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('like');
    Route::get('/upload', [PostController::class, 'create']);
    Route::middleware('optimizeImages')->group(function () {
        Route::post('/upload', [PostController::class, 'store']);
        Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    });
    Route::post('/video', [VideoController::class, 'store'])->name('video.store');
    Route::delete('/video/{video}', [VideoController::class, 'destroy'])->name('video.destroy');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
        Route::delete('/admin/posts/{post}/delete', [AdminController::class, 'deletePost'])->name('admin.post.destroy');
        Route::delete('/admin/@{user:id}/delete', [AdminController::class, 'deleteUser'])->name('admin.user.destroy');
    });
});
