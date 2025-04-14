<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

// Protect the /blogs route with authentication middleware
Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'user'])->name('user');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('blogs', BlogController::class)->except(['create', 'edit']);
    Route::patch('/blogs/{id}/status', [BlogController::class, 'changeStatus']);
});
