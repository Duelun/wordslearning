<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\WebpageSetController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\SetDictionariesController;
use App\Http\Controllers\User\SetWordsController;


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

    Route::post('dictlistdelete', [SetDictionariesController::class, 'delete'])
        ->name('dictlistdelete');

    Route::post('dictlistmodify', [SetDictionariesController::class, 'modify'])
        ->name('dictlistmodify');

    Route::post('dictlistsave', [SetDictionariesController::class, 'save'])
        ->name('dictlistsave');
    //Words
    Route::post('wordlist', [SetWordsController::class, 'wordlist'])
        ->name('wordlist');

    Route::post('wordlistdelete', [SetWordsController::class, 'delete'])
        ->name('wordlistdelete');

    Route::post('wordlistmodify', [SetWordsController::class, 'modify'])
        ->name('wordlistmodify');

    Route::post('wordlistsave', [SetWordsController::class, 'save'])
        ->name('wordlistsave');

    //Admin dashboard
    Route::get('adminsettings', [AdminDashboardController::class, 'settings'])
        ->name('adminsettings');

    Route::get('adminwords', [AdminDashboardController::class, 'words'])
        ->name('adminwords');

    Route::get('adminusers', [AdminDashboardController::class, 'users'])
        ->name('adminusers');

    //Admin dashboard pages



});
