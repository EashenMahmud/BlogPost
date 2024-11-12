<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicPostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

// Public Routes
Route::get('/', [PublicPostController::class, 'latestPosts'])->name('public.home');
Route::get('/public/posts/details/{post}', [PublicPostController::class, 'details'])->name('public.posts.details');
Route::get('/public/categories/{category}', [PublicPostController::class, 'categoryPosts'])->name('public.categories.posts');
Route::get('/about', [AboutController::class, 'about'])->name('public.about');
Route::get('/contact', [ContactController::class, 'contact'])->name('public.contact');

// Authenticated/Admin Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Point to the admin dashboard page
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('posts', PostController::class);
});

require __DIR__.'/auth.php';
