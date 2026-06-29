<?php

namespace App\Http\Controllers;

use App\Models\FamilyProfile;
use App\Models\FamilyMember;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FamilyProfileController extends Controller
{

    protected $user;
    protected $userId;
    public function __construct()
    {
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }
    public function show()
    {
        try {
            $profile = FamilyProfile::where('user_id',$this->userId)->first();

            if (!$profile) {
                return $this->errorResponse('Family profile not found.', 'NOT_FOUND', 404);
            }

            $profile->family_member = FamilyMember::where('user_id',$this->userId)->get();

            return $this->successResponse('Family profile retrieved.', $profile);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch family profile');
        }
    }

    /**
     * Create or update the authenticated user's family profile.
     */
    public function storeOrUpdate(Request $request)
    {
        try {
            $user = $this->user;

            $validated = $request->validate([
                'person'          => ['required', Rule::in(FamilyProfile::VISIBILITIES)],
                'bio'                 => 'nullable|string',
                'father_occupation'   => 'nullable|string|max:255',
                'mother_occupation'   => 'nullable|string|max:255',
                'brothers'            => 'nullable|integer|min:0',
                'sisters'             => 'nullable|integer|min:0',
                'family_type'         => ['nullable', Rule::in(FamilyProfile::FAMILY_TYPES)],
                'family_status'       => ['nullable', Rule::in(FamilyProfile::FAMILY_STATUSES)],
                'family_income'       => 'nullable|string|max:255',
                'family_values'       => ['nullable', Rule::in(FamilyProfile::FAMILY_VALUES)],
                'living_with_parents' => ['nullable', Rule::in(FamilyProfile::LIVING_WITH_PARENTS)],
            ]);

            $profile = FamilyProfile::updateOrCreate(
                ['user_id' => $user->id],
                $validated
            );
            $profile->family_member = FamilyMember::where('user_id',$this->userId)->get();

            return $this->successResponse('Family profile saved successfully.', $profile);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->errorResponse('Validation failed.', 'VALIDATION_ERROR', 422, $e->errors());
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to save family profile');
        }
    }

    /**
     * Delete the authenticated user's family profile (and all members).
     */
    public function destroy()
    {
        try {
            $profile = FamilyProfile::where('user_id',$this->userId)->first();

            if (!$profile) {
                return $this->errorResponse('Family profile not found.', 'NOT_FOUND', 404);
            }

            FamilyMember::where('user_id',$this->userId)->delete();

            $profile->delete();

            return $this->successResponse('Family profile deleted successfully.');
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to delete family profile');
        }
    }
}