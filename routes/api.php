<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\CareerController;
use App\Http\Controllers\Api\V1\Profile\ProfileController;
use App\Http\Controllers\Api\V1\SocialController;
use App\Http\Controllers\Api\V1\WorkExperienceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CommonController;
use App\Http\Controllers\Api\V1\UserProfileController;
use App\Http\Controllers\Api\V1\EducationDetailController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/auth')->group(function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);

    Route::middleware('verify.jwt')->group(function () {

        Route::get('profile', [ProfileController::class, 'profile']);
        // Route::get('me', [AuthController::class, 'me']);

        Route::prefix('common')->group(function () {
            Route::get('/get-industries', [CommonController::class, 'industries']);
            Route::get('/get-constants', [CommonController::class, 'getConstants']);
            Route::get('/get-platforms', [CommonController::class, 'getPlatforms']);
            Route::get('/get-skills', [CommonController::class, 'getSkills']);
            Route::get('/get-study', [CommonController::class, 'getStudy']);
        });

        Route::prefix('profile')->group(function () {
            Route::get('me', [UserProfileController::class, 'getProfile']);
            Route::post('update', [UserProfileController::class, 'updateProfile']);
            Route::post('lifestyle', [UserProfileController::class, 'lifestyleStore']);
            Route::post('favorite', [UserProfileController::class, 'favoriteStore']);
            Route::post('artist', [UserProfileController::class, 'artistStore']);
        });

        Route::prefix('social-links')->group(function () {
            Route::get('/get-social-links', [SocialController::class, 'getSocialLinks']);
            Route::post('/upsert', [SocialController::class, 'addSocialLink']);
            Route::post('/update', [SocialController::class, 'updateSocialLink']);
            Route::delete('/delete/{id}', [SocialController::class, 'deleteSocialLink']);
        });

        Route::prefix('work-experiences')->group(function () {
            Route::get('get-work-experiences', [WorkExperienceController::class, 'index']);
            Route::post('upsert-work-experiences', [WorkExperienceController::class, 'store']);
            Route::get('work-experiences/{id}', [WorkExperienceController::class, 'show']);
            Route::post('delete-work-experiences', [WorkExperienceController::class, 'destroy']);
        });

        Route::prefix('careers')->group(function () {
            Route::get('/get-careers-details', [CareerController::class, 'index']);
            Route::post('/upsert-career-details', [CareerController::class, 'storeOrUpdate']);
            Route::get('/get-career-details-by-id/{careerId}', [CareerController::class, 'show']);
            Route::post('/delete-career-details', [CareerController::class, 'deleteCareer']);
        });

        Route::apiResource('education-details', EducationDetailController::class);

    });

});
