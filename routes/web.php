<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SmsVerifyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');

Route::controller(RegisterController::class)->group(function () {
   Route::get('/register', 'index')->name('register.index');
   Route::post('/register', 'store')->name('register.store');
});



Route::controller(SmsVerifyController::class)->group(function () {
   Route::post('/sms/store', 'store')->name('sms.store');
   // Route::post('/orders', 'store');
});
