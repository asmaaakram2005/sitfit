<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;


// ================================= Home ======================================
Route::get('/', [HomeController::class, 'index'])->name('home');


// ============================= Front Pages ===================================

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/team', function () {
    return view('team.index');})->name('team.index');






// ================================= Guest ==============================================================
Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

});



// ================================== Auth =================================================================
Route::middleware('auth')->group(function () {

    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// ====================== Cart ======================

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/{product:slug}', [CartController::class, 'store'])->name('cart.store');

    Route::patch('/cart/{cartItem}/increase', [CartController::class, 'increase'])->name('cart.increase');

    Route::patch('/cart/{cartItem}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');

    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');

// ====================== contact ======================

    Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
    Route::post('/contact', [ContactController::class,'store'])->name('contact.store');

// ====================== Profile ======================

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// ====================== Adress ======================

    Route::get('/profile/address', [AddressController::class, 'index'])->name('profile.address');
    Route::post('/profile/address', [AddressController::class, 'store'])->name('profile.address.store');
    Route::get('/profile/address/edit', [AddressController::class, 'edit'])->name('profile.address.edit');
    Route::put('/profile/address', [AddressController::class, 'update'])->name('profile.address.update');
    Route::delete('/profile/address', [AddressController::class, 'destroy'])->name('profile.address.destroy');

// ====================== Orders ======================

    Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders');

// ====================== Checkout ======================

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

});
