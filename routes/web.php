<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;


// ================================= Home ======================================
Route::get('/', [HomeController::class, 'index'])->name('home');


// ============================= Front Pages ===================================

Route::get('/products', function () {
    return view('products.index');})->name('products.index');

Route::get('/products/{product}', function () {
    return view('products.show');})->name('products.show');

Route::get('/cart', function () {
    return view('cart.index');})->name('cart.index');






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

});
