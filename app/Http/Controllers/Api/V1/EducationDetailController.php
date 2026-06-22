<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\EducationDetailRequest;
use App\Http\Resources\V1\EducationDetailResource;
use App\Models\EducationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationDetailController extends Controller
{
    public function index(Request $request)
    {
        $educationDetails = $request->user()
            ->educationDetails() // assuming hasMany relation on User
            ->with(['study', 'skills'])
            ->get();

        return $this->successResponse('Education details retrieved successfully.', EducationDetailResource::collection($educationDetails));
    }

    public function store(EducationDetailRequest $request)
    {
        $user = $request->user();

        $data = $request->validated();
        $data['user_id'] = $user->id;

        // Remove skills from data to handle separately
        $skillsData = $data['skills'] ?? [];
        unset($data['skills']);

        $educationDetail = DB::transaction(function () use ($data, $skillsData) {
            $educationDetail = EducationDetail::create($data);

            // Sync skills with pivot percentage
            if (! empty($skillsData)) {
                $syncData = [];
                foreach ($skillsData as $skill) {
                    $syncData[$skill['skill_id']] = ['percentage' => $skill['percentage'] ?? null];
                }
                $educationDetail->skills()->sync($syncData);
            }

            return $educationDetail;
        });

        $educationDetail->load(['study', 'skills']);

        return $this->successResponse('Education detail created successfully.', new EducationDetailResource($educationDetail));
    }

    public function show(EducationDetail $educationDetail)
    {
        // Optional: authorize that the user owns this record
        // $this->authorize('view', $educationDetail); // using policies
        $educationDetail->load(['study', 'skills']);

        return $this->successResponse('Education detail retrieved successfully.', new EducationDetailResource($educationDetail));
    }

    public function update(EducationDetailRequest $request, EducationDetail $educationDetail)
    {
        // Authorize
        // $this->authorize('update', $educationDetail);

        $data = $request->validated();
        $skillsData = $data['skills'] ?? [];
        unset($data['skills']);

        DB::transaction(function () use ($educationDetail, $data, $skillsData) {
            $educationDetail->update($data);

            if (! empty($skillsData)) {
                $syncData = [];
                foreach ($skillsData as $skill) {
                    $syncData[$skill['skill_id']] = ['percentage' => $skill['percentage'] ?? null];
                }
                $educationDetail->skills()->sync($syncData);
            } else {
                // If skills array is empty, remove all relations? Or keep? We'll sync empty to detach.
                $educationDetail->skills()->sync([]);
            }
        });

        $educationDetail->load(['study', 'skills']);

        return $this->successResponse('Education detail updated successfully.', new EducationDetailResource($educationDetail));
    }

    public function destroy(EducationDetail $educationDetail)
    {
        // $this->authorize('delete', $educationDetail);
        $educationDetail->delete();

        return $this->successResponse('Education detail deleted successfully.', null);
    }
}
