<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ListCategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/upload-produk', function () {
//     return view('uploadproduk'); // Mengarahkan ke file uploadproduk.blade.php
// });

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/', [ListCategoryController::class, 'index'])->name('home');
    Route::get('/profile/edit', [CustomerController::class, 'editProfile'])->name('edit-profile');
    Route::post('/profile/edit', [CustomerController::class, 'updateProfile'])->name('update-profile');
    Route::get('/upload-produk', [ProductController::class, 'index'])->name('upload-produk');
    Route::post('/upload-produk', [ProductController::class, 'store'])->name('product.store');
});


Route::get('/profile', function () {
    return view('user.profile.edit');
});

// Regis dan Login
Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomerController::class, 'login'])->name('login.post');
Route::post('/logout', [CustomerController::class, 'logout'])->name('logout');
Route::get('/register', [CustomerController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [CustomerController::class, 'register'])->name('register.post');
