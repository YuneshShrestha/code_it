<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UpcomingController;
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
// Course category
Route::resource('category',CourseCategoryController::class);
// Course
Route::resource('course',CourseController::class);
// Upcoming
Route::resource('upcoming',UpcomingController::class);
// Blogs
Route::resource('blog',BlogController::class);
// Admin Panel END