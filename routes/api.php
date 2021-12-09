<?php

use App\Http\Controllers\Api\UpcomingController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CourseCategoryController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('setting',SettingController::class);
Route::apiResource('courseType',CourseCategoryController::class);
Route::apiResource('about',AboutController::class);
Route::apiResource('upcoming',UpcomingController::class);
Route::apiResource('blog',BlogController::class);
Route::apiResource('message',MessageController::class);