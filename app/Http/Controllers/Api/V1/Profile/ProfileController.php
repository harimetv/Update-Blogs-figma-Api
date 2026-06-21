<?php

namespace App\Http\Controllers\Api\V1\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
    public function profile(): JsonResponse
    {
        $userUuid = request()->attributes->get('user');

        if (! $userUuid) {
            return $this->errorResponse('User not found', 'USER_NOT_FOUND', 404);
        }

        return $this->successResponse('Fetch profile successful', $userUuid);

        // return response()->json([
        //     'success' => true,
        //     'message' => 'Fetch profile successful',
        //     'data' => $userUuid,
        // ], 200);

        // dd(request(), Auth::user());

        // $profile = SocialProfile::query()
        //     ->where('user_uuid', $userUuid)
        //     ->first();

        // if (!$profile) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Profile not found'
        //     ], 404);
        // }

        // return response()->json([
        //     'success' => true,
        //     'data' => [
        //         'user_uuid'        => $profile->user_uuid,
        //         'username'         => $profile->username,
        //         'bio'              => $profile->bio,
        //         'avatar'           => $profile->avatar,
        //         'cover_photo'      => $profile->cover_photo,
        //         'followers_count'  => $profile->followers_count,
        //         'following_count'  => $profile->following_count,
        //         'created_at'       => $profile->created_at,
        //     ]
        // ]);
        // return response()->json([
        //     'success' => false,
        //     'message' => 'Profile not found',
        // ], 404);
    }
}
