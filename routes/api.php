<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\CareerController;
use App\Http\Controllers\Api\V1\CommonController;
use App\Http\Controllers\Api\V1\EducationDetailController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\Profile\ProfileController;
use App\Http\Controllers\Api\V1\SocialController;
use App\Http\Controllers\Api\V1\UserProfileController;
use App\Http\Controllers\Api\V1\WorkExperienceController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\FamilyProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\MarriageProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('verify-otp', [AuthController::class, 'verifyOtp']);
        Route::post('re-send-otp', [AuthController::class, 'reSendOtp']);

        Route::post('check-username', [AuthController::class, 'checkUsername']);
        Route::post('check-email', [AuthController::class, 'checkEmail']);
        Route::post('check-referral', [AuthController::class, 'checkReferral']);
        Route::post('countries', [AuthController::class, 'getCountries']);
    });

    Route::middleware('verify.jwt')->group(function () {

        Route::get('profile', [ProfileController::class, 'profile']);
        Route::get('home-video', [HomeController::class, 'video']);

        Route::prefix('user')->group(function () {
            Route::get('hobbies', [UserProfileController::class, 'getAllHobbies']);
            Route::get('languages', [UserProfileController::class, 'getAllLanguages']);
            Route::get('interests', [UserProfileController::class, 'getAllInterests']);
            Route::get('comfortables', [UserProfileController::class, 'getAllComfortables']);
        });

        Route::prefix('common')->group(function () {
            Route::get('get-industries', [CommonController::class, 'industries']);
            Route::get('get-constants', [CommonController::class, 'getConstants']);
            Route::get('get-platforms', [CommonController::class, 'getPlatforms']);
            Route::get('get-skills', [CommonController::class, 'getSkills']);
            Route::get('get-study', [CommonController::class, 'getStudy']);
            Route::get('get-religions', [CommonController::class, 'getReligions']);
            // Route::get('get-country', [CommonController::class, 'getCountry']);
            Route::get('get-casts', [CommonController::class, 'getCasts']);
            Route::get('get-gotras', [CommonController::class, 'getGotras']);
            Route::get('countries', [CommonController::class, 'getCountry']);
        });

        Route::prefix('profile')->group(function () {
            Route::get('me', [UserProfileController::class, 'getProfile']);
            Route::post('update', [UserProfileController::class, 'updateProfile']);
            Route::post('lifestyle', [UserProfileController::class, 'lifestyleStore']);
            Route::post('favorite', [UserProfileController::class, 'favoriteStore']);
            Route::post('artist', [UserProfileController::class, 'artistStore']);
        });

        Route::prefix('social-links')->group(function () {
            Route::get('get-social-links', [SocialController::class, 'getSocialLinks']);
            Route::post('upsert', [SocialController::class, 'addSocialLink']);
            Route::post('update', [SocialController::class, 'updateSocialLink']);
            Route::delete('delete/{id}', [SocialController::class, 'deleteSocialLink']);
        });

        Route::prefix('work-experiences')->group(function () {
            Route::get('get-work-experiences', [WorkExperienceController::class, 'index']);
            Route::post('upsert-work-experiences', [WorkExperienceController::class, 'store']);
            Route::get('work-experiences/{id}', [WorkExperienceController::class, 'show']);
            Route::post('delete-work-experiences', [WorkExperienceController::class, 'destroy']);
        });

        Route::prefix('careers')->group(function () {
            Route::get('get-careers-details', [CareerController::class, 'index']);
            Route::post('upsert-career-details', [CareerController::class, 'storeOrUpdate']);
            Route::get('get-career-details-by-id/{careerId}', [CareerController::class, 'show']);
            Route::post('delete-career-details', [CareerController::class, 'deleteCareer']);
        });

        Route::apiResource('education-details', EducationDetailController::class);
        Route::apiResource('family-members', FamilyMemberController::class);

        Route::prefix('family-profile')->group(function () {
            Route::get('/', [FamilyProfileController::class, 'show']);           // Get profile
            Route::post('/', [FamilyProfileController::class, 'storeOrUpdate']); // Create/Update profile
            Route::delete('/', [FamilyProfileController::class, 'destroy']);
        });

        Route::post('contact-info', [ContactController::class,'store']);

        Route::get('get-marriage-profile', [MarriageProfileController::class, 'show']);
        Route::post('update-marriage-profile', [MarriageProfileController::class, 'store']);
        Route::put('marriage-profile', [MarriageProfileController::class, 'update']);

    });

});
