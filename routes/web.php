<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ListCategoryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/detail-produk', function () {
    return view('detailproduk'); // Mengarahkan ke file uploadproduk.blade.php
});

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/', [ListCategoryController::class, 'index'])->name('home');
    Route::get('/profile/edit', [CustomerController::class, 'editProfile'])->name('edit-profile');
    Route::post('/profile/edit', [CustomerController::class, 'updateProfile'])->name('update-profile');
    Route::get('/upload-produk', [ProductController::class, 'index'])->name('upload-produk');
    Route::post('/upload-produk', [ProductController::class, 'store'])->name('product.store');
    // Route::get('/list-produk', [ProductController::class, 'list'])->name('list-produk');
    Route::get('/products/category/{id}', [ProductController::class, 'showByCategory'])->name('products.by-category');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
    //Wishlist
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');





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
