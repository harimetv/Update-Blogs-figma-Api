<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Profile\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::prefix('v1')->middleware('verify.jwt')->group(function () {

// });

Route::prefix('v1/auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware('verify.jwt')->group(function () {

        Route::get('profile', [ProfileController::class, 'profile']);
        Route::get('me', [AuthController::class, 'me']);

    });

});
