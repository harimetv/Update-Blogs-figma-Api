<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\ProfileUpdateRequest;
use App\Http\Requests\StoreArtistProfileRequest;
use App\Http\Requests\StoreUserFavoriteRequest;
use App\Http\Requests\User\StoreUserLifestyleRequest;
use App\Models\ArtistProfile;
use App\Models\Comfortable;
use App\Models\Hobby;
use App\Models\Interest;
use App\Models\Language;
use App\Models\UserFavorite;
use App\Models\UserLifestyle;
use App\Services\User\ProfileService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Constants\ResponseCode;
use Exception;

class UserProfileController extends Controller
{
    protected $profileService;
    protected $user;
    protected $userId;
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }

    // public function getProfile(Request $request)
    // {
    //     try {
    //         // $profile = $this->userService->find(['id' => $this->user->id]);

    //         return $this->successResponse(
    //             'Profile fetched successfully11',
    //             $profile,
    //             ResponseCode::OK,
    //         );

    //     } catch (Exception $e) {
    //         $errorId = log_exception($e, 'Profile Fetch Error');

    //         return $this->errorResponse(
    //             "Unable to update profile. Please contact support with Error ID: {$errorId}.",
    //             'EXCEPTION',
    //             ResponseCode::INTERNAL_ERROR,
    //             new \stdClass
    //         );
    //     }
    // }

    // public function updateProfile(ProfileUpdateRequest $request)
    // {
    //     $validated = $request->validated();
    //     try {
    //         $profile = $this->profileService->profileUpdate($validated, $this->userId);

    //         return $this->successResponse(
    //             'Profile updated successfully',
    //             $profile,
    //             ResponseCode::OK,
    //         );

    //     } catch (Exception $e) {
    //         $errorId = log_exception($e, 'Profile Update Error');

    //         return $this->errorResponse(
    //             "Unable to update profile. Please contact support with Error ID: {$errorId}.",
    //             'EXCEPTION',
    //             ResponseCode::INTERNAL_ERROR,
    //             new \stdClass
    //         );
    //     }
    // }

    // public function getUserProfile(Request $request, $username)
    // {
    //     try {
    //         // sleep(4);
    //         $profile = $this->userService->find(['username' => $username]);

    //         return $this->successResponse(
    //             'Profile fetched successfully',
    //             $profile,
    //             ResponseCode::OK,
    //         );

    //     } catch (Exception $e) {
    //         $errorId = log_exception($e, 'Profile Fetch Error');

    //         return $this->errorResponse(
    //             "Unable to update profile. Please contact support with Error ID: {$errorId}.",
    //             'EXCEPTION',
    //             ResponseCode::INTERNAL_ERROR,
    //             new \stdClass
    //         );
    //     }
    // }

    public function getProfile(Request $request)
    {
        try {
            // Fetch the authenticated user's profile
            // $profile = $this->profileService->find(['user_id' => $this->userId]);
            $profile = $this->profileService->getUserProfile();
            
            return $this->successResponse(
                'Profile fetched successfully',
                $profile,
                ResponseCode::OK
            );
        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Fetch Error');
            return $this->errorResponse(
                "Unable to fetch profile. Please contact support with Error ID: {$errorId}.",
                'EXCEPTION',
                ResponseCode::INTERNAL_ERROR,
                new \stdClass
            );
        }
    }

    public function updateProfile(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();
        try {
            $profile = $this->profileService->profileUpdate($validated, $this->userId);

            return $this->successResponse(
                'Profile updated successfully',
                $profile,
                ResponseCode::OK
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
            // Fetch profile by username (column in profiles table)
            $profile = $this->profileService->find(['username' => $username]);

            return $this->successResponse(
                'Profile fetched successfully',
                $profile,
                ResponseCode::OK
            );
        } catch (Exception $e) {
            $errorId = log_exception($e, 'Profile Fetch Error');
            return $this->errorResponse(
                "Unable to fetch profile. Please contact support with Error ID: {$errorId}.",
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
                'lifestyle updated successfully',
                $lifestyle,
                ResponseCode::OK,
            );

        } catch (Exception $e) {
            $errorId = log_exception($e, 'lifestyle Update Error');

            return $this->errorResponse(
                "Unable to update lifestyle. Please contact support with Error ID: {$errorId}.",
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
            $interests = Interest::where('status', true)->get();

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
