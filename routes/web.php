<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\ProfileController as PanelProfileController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowPostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/post/{post}', [ShowPostController::class, 'index'])->name('post.show');

Route::middleware('auth')->get('/profile', [PanelProfileController::class, 'index'])->name('profile.index');
Route::middleware('auth')->put('/profile', [PanelProfileController::class, 'update'])->name('profile.update');

Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'IsAdmin'])->prefix('/panel')->group(function () {
    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/categories', CategoryController::class)->except(['show', 'create']);
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::middleware(['auth', 'IsAuthor'])->prefix('/panel')->group(function () {
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::post('/editor/upload', [EditorUploadController::class, 'upload'])->name('upload-file');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
