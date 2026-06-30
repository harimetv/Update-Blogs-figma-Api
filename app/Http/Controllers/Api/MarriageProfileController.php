<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MarriageProfile;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarriageProfileController extends Controller
{
    use ApiResponse;

    /**
     * Get the authenticated user's marriage profile.
     */
    public function show(Request $request)
    {
        try {
            $profile = $request->user()->marriageProfile;

            if (!$profile) {
                return $this->errorResponse(
                    'Profile not found.',
                    'NOT_FOUND',
                    404
                );
            }

            return $this->successResponse('Profile retrieved successfully.', $profile);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch profile');
        }
    }

    /**
     * Store a new marriage profile for the authenticated user.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'religion_id'      => 'required|integer|exists:religions,id', // adjust if table not exists
            'cast_id'          => 'nullable|integer|exists:casts,id',
            'country_id'       => 'nullable|integer|exists:countries,id',
            'city_id'          => 'nullable|integer|exists:cities,id',
            'gotra_id'         => 'nullable|integer|exists:gotras,id',
            'person'           => 'required|in:public,private,only_me',
            'bio'              => 'nullable|string',
            'age'              => 'nullable|string|max:50',
            'manage_by'        => 'nullable|string|max:255',
            'manglik'          => 'nullable|string|max:50',
            'highest_degree'   => 'nullable|string|max:255',
            'occupation'       => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse(
                'Validation failed.',
                'VALIDATION_ERROR',
                422,
                $validator->errors()
            );
        }

        try {
            $user = $request->user();

            // Check if profile already exists
            if ($user->marriageProfile) {
                return $this->errorResponse(
                    'Profile already exists. Use update method.',
                    'PROFILE_EXISTS',
                    409
                );
            }

            $data = $validator->validated();
            $data['user_id'] = $user->id;

            $profile = MarriageProfile::create($data);

            return $this->successResponse(
                'Marriage profile created successfully.',
                $profile,
                201
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to create profile');
        }
    }

    /**
     * Update the authenticated user's marriage profile.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'religion_id'      => 'sometimes|required|integer|exists:religions,id',
            'cast_id'          => 'nullable|integer|exists:casts,id',
            'country_id'       => 'nullable|integer|exists:countries,id',
            'city_id'          => 'nullable|integer|exists:cities,id',
            'gotra_id'         => 'nullable|integer|exists:gotras,id',
            'person'           => 'sometimes|required|in:public,private,only_me',
            'bio'              => 'nullable|string',
            'age'              => 'nullable|string|max:50',
            'manage_by'        => 'nullable|string|max:255',
            'manglik'          => 'nullable|string|max:50',
            'highest_degree'   => 'nullable|string|max:255',
            'occupation'       => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse(
                'Validation failed.',
                'VALIDATION_ERROR',
                422,
                $validator->errors()
            );
        }

        try {
            $profile = $request->user()->marriageProfile;

            if (!$profile) {
                return $this->errorResponse(
                    'Profile not found. Create one first.',
                    'NOT_FOUND',
                    404
                );
            }

            $profile->update($validator->validated());

            return $this->successResponse(
                'Marriage profile updated successfully.',
                $profile
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update profile');
        }
    }
}