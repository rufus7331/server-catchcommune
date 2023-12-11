<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CatchEntryController;
use App\Http\Controllers\FishingSpotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//TODO: Add auth middleware to all routes
//TODO: use eloquent-resources
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/fishing-spots', [FishingSpotController::class, 'store']);
Route::get('/fishing-spots', [FishingSpotController::class, 'index']);
Route::apiResource('catch-entries', CatchEntryController::class);
Route::post('/articles', [ArticleController::class, 'store'])->middleware('auth:sanctum');


