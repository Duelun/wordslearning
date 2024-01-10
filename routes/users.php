<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\WebpageSetController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\SetDictionariesController;


Route::middleware('auth')->group(function () {

    //User dashboard
    Route::get('userlearning', [UserDashboardController::class, 'learning'])
        ->name('userlearning');

    Route::get('userdictionaries', [UserDashboardController::class, 'dictionaries'])
        ->name('userdictionaries');

    Route::get('usersettings', [UserDashboardController::class, 'settings'])
        ->name('usersettings');

    Route::post('userdocuments', [UserDashboardController::class, 'documents'])
        ->name('userdocuments');

    //User dashboard pages
    //Settings
    Route::post('userpersonal', [RegisterController::class, 'change'])
        ->name('userpersonal');

    Route::post('webpageset', [WebpageSetController::class, 'change'])
        ->name('webpageset');
    //Dictionaries
    Route::post('dictlist', [SetDictionariesController::class, 'dictlist'])
        ->name('dictlist');

    //Admin dashboard
    Route::get('adminsettings', [AdminDashboardController::class, 'settings'])
        ->name('adminsettings');

    Route::get('adminwords', [AdminDashboardController::class, 'words'])
        ->name('adminwords');

    Route::get('adminusers', [AdminDashboardController::class, 'users'])
        ->name('adminusers');

    //Admin dashboard pages



});
