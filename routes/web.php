<?php

use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/post/{id}', function () {
    return view('post');
})->name('post.show');

Route::middleware('auth')->get('/karbar', fn() => 'profile')->name('karbar');

Route::get('/dashboard', function () {
    return view('panel.index');
})->middleware(['auth', 'verified'])->name('dashboard');

// middlware auth baraye inke faghat karbarani k login bashand betonan varede masire panel/users beshan
Route::middleware(['auth', 'IsAdmin'])->resource('panel/users',UserController::class)->except(['show']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
