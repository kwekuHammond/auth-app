<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::post('/users/login', [UserController::class, 'login']);

Route::get('/auth/redirect', function(){
    return Socialite::driver('google')->stateless()->redirect();
});

Route::get('/auth/callback', [UserController::class, 'googleAuth']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users', UserController::class)->only(['update', 'show']);
});
