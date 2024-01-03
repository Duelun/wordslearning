<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoggingController;
use App\Http\Controllers\PageLanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__.'/users.php';
require __DIR__.'/guest.php';

//Logout
Route::any('logout', [LoggingController::class, 'logout'])
    ->name('logout');

//Changelang
Route::get('changelang/{flagcode}', [PageLanguageController::class, 'setlang'])
    ->name('changelang');

//Split guest/user
Route::any('/', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('startpage');
    } });

Route::any('/dashboard', function () {
    if (Auth::check()) {
        return view('dashboard');
    } else {
        return view('startpage');
    } });

Route::any('/mainrout', function () { return view('startpage'); });
