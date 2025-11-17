<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/home',[PageController::class,'home'])->name('home');
Route::get('/about',[PageController::class,'about'])->name('about');
Route::get('/create',[PageController::class,'create'])->name('create');
Route::get('/update',[PageController::class,'update'])->name('update');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/post',[PageController::class,'post'])->name('post');
Route::post('/store',[PageController::class,"store"])->name('store');
Route::get('/', [PageController::class,'home']);
Route::get('/dashboard', [PageController::class,'home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
