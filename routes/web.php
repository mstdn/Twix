<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TimelineController::class, 'public'])->name('landing');
Route::get('/@{user:username}', [UserController::class, 'show'])->name('user.show');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Home timeline
    Route::get('/', [TimelineController::class, 'home'])->name('home');
    Route::post('/', [PostController::class, 'store'])->name('publish.post');
    // Follow / unfollow
    Route::post('/{user:username}/follow', [UserController::class, 'follow'])->name('follow');
});
