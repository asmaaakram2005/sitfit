<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;


// ================================= Home ======================================
Route::get('/', [HomeController::class, 'index'])->name('home');


// ============================= Front Pages ===================================

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/team', function () {
    return view('team.index');})->name('team.index');






// ================================= Guest ====================================
Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');

});



// ================================== Auth ================================
Route::middleware('auth')->group(function () {

    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart/{product:slug}', [CartController::class, 'store'])->name('cart.store');

    Route::patch('/cart/{cartItem}/increase', [CartController::class, 'increase'])->name('cart.increase');

    Route::patch('/cart/{cartItem}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');

    Route::delete('/cart/{cartItem}', [CartController::class, 'destroy'])->name('cart.destroy');

    Route::delete('/cart', [CartController::class, 'clear'])->name('cart.clear');


    Route::get('/profile/edit', function () {
    return view('profile.edit');})->name('profile.edit');

    Route::get('/profile/address', function(){
        return view('/profile/addresses');})
    ->name('profile.address');

// ====================== Checkout ======================

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::get('/checkout/success', function () {
    return view('checkout.success');})->name('checkout.success');

});
