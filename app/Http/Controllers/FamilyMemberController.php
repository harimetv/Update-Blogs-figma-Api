<?php
namespace App\Http\Controllers;

use App\Models\FamilyMember;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class FamilyMemberController extends Controller
{
    protected $user;
    protected $userId;
    public function __construct()
    {
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }
    public function index()
    {
        try {
            $members = FamilyMember::where('user_id',$this->userId)->get();
            return $this->successResponse('Family members retrieved successfully.', $members);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch family members');
        }
    }

    /**
     * Store a newly created family member.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'relation_type' => ['required', 'string', Rule::in(FamilyMember::RELATION_TYPES)],
                'name'          => 'required|string|max:255',
                'age'           => 'required|integer|min:0|max:150',
            ]);
            $validated['user_id'] = $this->userId;

            $member = FamilyMember::create($validated);

            return $this->successResponse('Family member added successfully.', $member, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->errorResponse('Validation failed.', 'VALIDATION_ERROR', 422, $e->errors());
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to add family member');
        }
    }

    /**
     * Display the specified family member.
     */
    public function show($id)
    {
        try {
            $member = FamilyMember::where('user_id',$this->userId)->where('id',$id)->first();
             if(!$member) {
                return $this->errorResponse("data not found", 'DATA_NOT_FOUND',404);
            }
            return $this->successResponse('Family member retrieved successfully.', $member);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Family member not found.', 'NOT_FOUND', 404);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch family member');
        }
    }

    /**
     * Update the specified family member.
     */
    public function update(Request $request, $id)
    {
        try {
            $member = FamilyMember::where('user_id',$this->userId)->where('id',$id)->first();
            if(!$member) {
                return $this->errorResponse("data not found", 'DATA_NOT_FOUND',404);
            }
            $validated = $request->validate([
                'relation_type' => ['sometimes', 'required', 'string', Rule::in(FamilyMember::RELATION_TYPES)],
                'name'          => 'sometimes|required|string|max:255',
                'age'           => 'sometimes|required|integer|min:0|max:150',
            ]);

            $member->update($validated);

            return $this->successResponse('Family member updated successfully.', $member);
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Family member not found.', 'NOT_FOUND', 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->errorResponse('Validation failed.', 'VALIDATION_ERROR', 422, $e->errors());
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update family member');
        }
    }

    /**
     * Remove the specified family member.
     */
    public function destroy($id)
    {
        try {
            $member = FamilyMember::findOrFail($id);
            $member->delete();

            return $this->successResponse('Family member deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return $this->errorResponse('Family member not found.', 'NOT_FOUND', 404);
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to delete family member');
        }
    }
}