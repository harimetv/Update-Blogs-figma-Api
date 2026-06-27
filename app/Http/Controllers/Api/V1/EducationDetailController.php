<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\EducationDetailRequest;
use App\Http\Resources\V1\EducationDetailResource;
use App\Models\EducationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EducationDetailSkill;
class EducationDetailController extends Controller
{
    protected $user;
    protected $userId;
    public function __construct()
    {
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }
    public function index(Request $request)
    {
        $educationDetails = EducationDetail::where('user_id', $this->userId)->with(['study', 'skills','city'])->get();

        return $this->successResponse('Education details retrieved successfully.', EducationDetailResource::collection($educationDetails));
    }

    public function store(EducationDetailRequest $request)
    {
        $user = $this->user;
        $data = $request->validated();
        $data['user_id'] = $user->id;

        if ($request->hasFile('media')) {
            $file = $request->file('media');
            $path = $file->store('uploads/education', 'public'); // stores in storage/app/public/uploads/education
            $data['media'] = $path; // save relative path in DB
        }


        $skillsData = $data['skills'] ?? [];
        unset($data['skills']);

        $educationDetail = DB::transaction(function () use ($data, $skillsData) {
            $educationDetail = EducationDetail::create($data);
            foreach ($skillsData as $skillItem) {
                EducationDetailSkill::create([
                    'education_detail_id' => $educationDetail->id,
                    'skill' => $skillItem['skill'],
                    'percentage' => $skillItem['percentage'] ?? null,
                ]);
            }

            return $educationDetail;
        });

        $educationDetail->load('study','skills','city');

        return $this->successResponse('Education detail created successfully.', new EducationDetailResource($educationDetail));
    }

    public function update(EducationDetailRequest $request, EducationDetail $educationDetail)
    {
        $data = $request->validated();

        if ($request->hasFile('media')) {
            // Delete old file if exists
            if ($educationDetail->media && Storage::disk('public')->exists($educationDetail->media)) {
                Storage::disk('public')->delete($educationDetail->media);
            }

            $file = $request->file('media');
            $path = $file->store('uploads/education', 'public');
            $data['media'] = $path;
        }
        $skillsData = $data['skills'] ?? [];
        unset($data['skills']);

        DB::transaction(function () use ($educationDetail, $data, $skillsData) {
            $educationDetail->update($data);
            $educationDetail->skills()->delete();

            foreach ($skillsData as $skillItem) {
                $educationDetail->skills()->create([
                    'skill' => $skillItem['skill'],
                    'percentage' => $skillItem['percentage'] ?? null,
                ]);
            }
        });

        $educationDetail->load('study','skills','city');

        return $this->successResponse('Education detail updated successfully.', new EducationDetailResource($educationDetail));
    }

    public function show(EducationDetail $educationDetail)
    {
        $educationDetail->load(['study', 'skills','city']);

        return $this->successResponse('Education detail retrieved successfully.', new EducationDetailResource($educationDetail));
    }

    public function destroy(EducationDetail $educationDetail)
    {
        $educationDetail->delete();

        return $this->successResponse('Education detail deleted successfully.', null);
    }
}
