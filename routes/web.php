<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Panel START

// Settings
Route::resource('settings',SettingsController::class);
// About Us
Route::resource('about',AboutController::class);

// Admin Panel END