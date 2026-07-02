<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MarriageProfile;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarriageProfileController extends Controller
{
    protected $user;
    protected $userId;
    public function __construct()
    {
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }

    public function show(Request $request)
    {
        try {
            $profile = MarriageProfile::where('user_id', $this->userId)->first();

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

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'religion_id'      => 'required|integer|exists:religions,id',
            'cast_id'          => 'nullable|integer|exists:casts,id',
            'country_id'       => 'nullable|integer|exists:countries,id',
            'city_id'          => 'nullable|integer|exists:cities,id',
            'gotra_id'         => 'nullable|integer|exists:gotras,id',
            'person'           => 'required|in:public,private,onlyme',
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
            $user = $this->user;

            $data = $validator->validated();
            $data['user_id'] = $user->id;
            $profile = MarriageProfile::where('user_id', $this->userId)->first();

            if (!$profile) {
                $profile = MarriageProfile::create($data);
            }
            $profile->update($validator->validated());

            return $this->successResponse(
                'Marriage profile created successfully.',
                $profile
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to create profile');
        }
    }
}