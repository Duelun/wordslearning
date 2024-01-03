<?php

use App\Http\Controllers\Auth\LoggingController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::post('register', [RegisterController::class, 'store'])
        ->name('register');

    Route::post('login', [LoggingController::class, 'login'])
        ->name('login');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

});

