<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ListCategoryController;
use App\Http\Controllers\TransactionController;

Route::middleware(['auth:customer'])->group(function () {
    Route::get('/', [ListCategoryController::class, 'index'])->name('home');
    Route::get('/profile/edit', [CustomerController::class, 'editProfile'])->name('edit-profile');
    Route::post('/profile/edit', [CustomerController::class, 'updateProfile'])->name('update-profile');
    Route::get('/upload-produk', [ProductController::class, 'index'])->name('upload-produk');
    Route::post('/upload-produk', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products', [ProductController::class, 'listAllProducts'])->name('products.all');
    Route::get('/products/category/{id}', [ProductController::class, 'showByCategory'])->name('products.by-category');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
    Route::post('/product/{id}/purchase', [ProductController::class, 'purchase'])->name('product.purchase');

    //Wishlist
    Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');  // Menambah produk ke wishlist
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index'); // Melihat wishlist
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove'); // Menghapus produk dari wishlist

    //alamat
    // Rute untuk menampilkan daftar alamat
    Route::get('/alamat', [AlamatController::class, 'index'])->name('alamat.index');
    Route::post('/alamat', [AlamatController::class, 'store'])->name('alamat.store');
    Route::get('/alamat/{id}/edit', [AlamatController::class, 'edit'])->name('alamat.edit');
    Route::put('/alamat/{id}', [AlamatController::class, 'update'])->name('alamat.update');
    Route::delete('/alamat/{id}', [AlamatController::class, 'destroy'])->name('alamat.destroy');
    //diskusi
    // Route untuk menyimpan diskusi
    Route::post('/product/{id}/diskusi', [ProductController::class, 'storeDiscussion'])->middleware('auth:customer')->name('discussion.store');


    //Cart
    Route::middleware('auth')->group(function () {
        // Route untuk menambahkan produk ke keranjang
        Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

        // Route untuk menampilkan keranjang
        Route::get('/cart', [CartController::class, 'getCart'])->name('cart.index');

        // Route untuk menurunkan jumlah produk di keranjang
        Route::patch('/cart/{cartItemId}/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');

        // Route untuk meningkatkan jumlah produk di keranjang
        Route::patch('/cart/{cartItemId}/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');

        // Route untuk menghapus item dari keranjang
        Route::delete('/cart/{cartItemId}/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');


        //Transaction
        // Route::get('/status-produk', function () {
        //     return view('statusproduk'); // Mengarahkan ke file uploadproduk.blade.php
        // });
        
        // Route untuk menambahkan produk ke transaksi
        Route::post('/status-produk/add/', [TransactionController::class, 'addToTransaction'])->name('transaction.add');
        Route::get('/status-produk', [TransactionController::class, 'showStatusProduk'])->name('status.produk');

    });
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
