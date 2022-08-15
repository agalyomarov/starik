<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Login\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
