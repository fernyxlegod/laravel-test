<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');
Route::resource('posts', PostController::class);
Route::get('users', [PostController::class, 'indexUsers'])->name('users.index');
Route::get('users/{user}', [PostController::class, 'showUser'])->name('users.show');
