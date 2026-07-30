<?php

use Illuminate\Support\Facades\Route;

// ================= Front Controllers =================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ReviewController;

// ================= Admin Controllers =================
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;



// =======================================================
// Home
// =======================================================

Route::get('/', [HomeController::class, 'index'])->name('home');



// =======================================================
// Public Pages
// =======================================================

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/team', [TeamController::class, 'index'])
    ->name('team.index');



// =======================================================
// Guest
// =======================================================

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->name('register.store');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

});



// =======================================================
// Auth
// =======================================================

Route::middleware('auth')->group(function () {

    Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    // ================= Cart =================

    Route::controller(CartController::class)->group(function () {

        Route::get('/cart', 'index')->name('cart.index');

        Route::post('/cart/{product:slug}', 'store')->name('cart.store');

        Route::patch('/cart/{cartItem}/increase', 'increase')->name('cart.increase');

        Route::patch('/cart/{cartItem}/decrease', 'decrease')->name('cart.decrease');

        Route::delete('/cart/{cartItem}', 'destroy')->name('cart.destroy');

        Route::delete('/cart', 'clear')->name('cart.clear');

    });



    // ================= Contact =================

    Route::controller(ContactController::class)->group(function () {

        Route::get('/contact', 'index')->name('contact.index');

        Route::post('/contact', 'store')->name('contact.store');

    });



    // ================= Profile =================

    Route::controller(ProfileController::class)->group(function () {

        Route::get('/profile/edit', 'edit')->name('profile.edit');

        Route::patch('/profile/update', 'update')->name('profile.update');

    });



    // ================= Address =================

    Route::controller(AddressController::class)->group(function () {

        Route::get('/profile/address', 'index')->name('profile.address');

        Route::post('/profile/address', 'store')->name('profile.address.store');

        Route::get('/profile/address/edit', 'edit')->name('profile.address.edit');

        Route::put('/profile/address', 'update')->name('profile.address.update');

        Route::delete('/profile/address', 'destroy')->name('profile.address.destroy');

    });



    // ================= Orders =================

    Route::get('/profile/orders', [OrderController::class, 'index'])
        ->name('profile.orders');

    // ================= Reviews =================

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');



    // ================= Checkout =================

    Route::controller(CheckoutController::class)->group(function () {

        Route::get('/checkout', 'index')->name('checkout.index');

        Route::post('/checkout/quick/{product}', 'quickOrder')->name('checkout.quick');

        Route::post('/checkout', 'store')->name('checkout.store');

        Route::get('/checkout/success/{order}', 'success')->name('checkout.success');

    });

});



// =======================================================
// Admin
// =======================================================

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->name('admin.')
    ->group(function () {

        // Dashboard

        Route::get('/', [AdminController::class, 'index'])
            ->name('dashboard');



        // Products

        Route::controller(AdminProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/create', 'create')->name('create');

                Route::get('/{product}/edit', 'edit')->name('edit');

            });



        // Orders

        Route::controller(AdminOrderController::class)
            ->prefix('orders')
            ->name('orders.')
            ->group(function () {

                Route::get('/', 'index')->name('index');

                Route::get('/{order}', 'show')->name('show');

            });



        // Users

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');



        // Reviews

        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('reviews.index');



        // Contacts

        Route::get('/contacts', [AdminContactController::class, 'index'])
            ->name('contacts.index');

    });