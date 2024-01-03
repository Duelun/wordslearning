<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\WebpageSetController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::middleware('auth')->group(function () {

    //User dashboard
    Route::get('userlearning', [UserDashboardController::class, 'learning'])
        ->name('userlearning');

    Route::get('userdictionaries', [UserDashboardController::class, 'dictionaries'])
        ->name('userdictionaries');

    Route::get('usersettings', [UserDashboardController::class, 'settings'])
        ->name('usersettings');

    Route::get('userhelp', [UserDashboardController::class, 'help'])
        ->name('userhelp');

    //User dashboard pages
    //Settings
    Route::post('userpersonal', [RegisterController::class, 'changeUserData'])
        ->name('userpersonal');

    Route::post('webpageset', [WebpageSetController::class, 'change'])
        ->name('webpageset');

    //Admin dashboard
    Route::get('adminsettings', [AdminDashboardController::class, 'settings'])
        ->name('adminsettings');

    Route::get('adminwords', [AdminDashboardController::class, 'words'])
        ->name('adminwords');

    Route::get('adminusers', [AdminDashboardController::class, 'users'])
        ->name('adminusers');

    //Admin dashboard pages



});
