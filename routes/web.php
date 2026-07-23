<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\HomeController;

Route::get("/register", [RegisteredUserController::class,'create'] )->name('register');
Route::post('/register', [RegisteredUserController::class,'store'])->name('register.store');

Route::get('/login', [AuthenticatedSessionController::class,'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store'])->name('login.store');

Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('home');
