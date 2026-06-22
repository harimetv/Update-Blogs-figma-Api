<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    protected $userService;

    protected $profileService;

    protected $user;

    public function __construct()
    {
        $this->userService = app(UserService::class);
        $this->profileService = app(ProfileService::class);
        $this->user = Auth::user();
    }

    public function getProfile(Request $request)
    {
        try {
            $profile = $this->userService->find(['id' => $this->user->id]);

            return $this->successResponse(
                'Profile fetched successfully11',
                $profile,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Fetch Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        try {
            $profile = $this->profileService->profileUpdate($validated, $this->user);

            return $this->successResponse(
                'Profile updated successfully',
                $profile,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function getUserProfile(Request $request, $username)
    {
        try {
            // sleep(4);
            $profile = $this->userService->find(['username' => $username]);

            return $this->successResponse(
                'Profile fetched successfully',
                $profile,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Fetch Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function getAllHobbies(Request $request)
    {
        try {
            $hobbies = Hobby::where('status', true)->select(['id', 'name', 'type'])->orderBy('name')->get();

            return $this->successResponse(
                'Hobbies fetched successfully',
                $hobbies,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Hobbies Fetch Error');

            return $this->errorResponse(
                "Unable to Hobbies. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function getAllLanguages(Request $request)
    {
        try {
            $languages = Language::where('status', true)->select(['id', 'name'])->orderBy('name')->get();

            return $this->successResponse(
                'Language fetched successfully',
                $languages,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Language Fetch Error');

            return $this->errorResponse(
                "Unable to Language. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function lifestyleStore(StoreUserLifestyleRequest $request)
    {
        $validated = $request->validated();
        try {

            $lifestyle = UserLifestyle::updateOrCreate(
                ['user_id' => $this->user->id],
                $validated
            );

            return $this->successResponse(
                'Profile updated successfully',
                $lifestyle,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function favoriteStore(StoreUserFavoriteRequest $request)
    {
        $validated = $request->validated();
        try {

            $favorite = UserFavorite::updateOrCreate(
                ['user_id' => $this->user->id],
                $validated
            );

            return $this->successResponse(
                'Profile updated successfully',
                $favorite,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function artistStore(StoreArtistProfileRequest $request)
    {
        $validated = $request->validated();
        try {

            $favorite = ArtistProfile::updateOrCreate(
                ['user_id' => $this->user->id],
                $validated
            );

            return $this->successResponse(
                'Profile updated successfully',
                $favorite,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function getAllInterests()
    {
        try {
            $interests = InterestIn::where('status', true)->get();

            return $this->successResponse('Interests retrieved successfully', $interests, ResponseCode::OK);
        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    // ✅ API 2: Fetch Comfortables
    public function getAllComfortables()
    {
        try {
            $comfortables = Comfortable::where('status', true)->get();

            return $this->successResponse('Comfortables retrieved successfully', $comfortables, ResponseCode::OK);
        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Update Error');

            return $this->errorResponse(
                "Unable to update profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }
}
