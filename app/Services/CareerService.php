<?php

namespace App\Services;

use App\Models\CareerDetail;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CareerService
{
    /**
     * Create or update career details
     */
    public function saveCareer(array $data, ?int $careerId = null): CareerDetail
    {
        return DB::transaction(function () use ($data, $careerId) {
            if ($careerId) {
                $career = CareerDetail::findOrFail($careerId);
                $career->update([
                    'headline' => $data['headline'] ?? $career->headline,
                    'career_description' => $data['career_description'] ?? $career->career_description,
                    'media' => $data['media'] ?? $career->media,
                    'skills_id' => $data['skills_id'] ?? $career->skills_id,
                    'work_experience_id' => isset($data['work_experience_ids']) ? $data['work_experience_ids'] : json_decode($data['work_experience_ids'], true),
                    'rating' => $data['rating'] ?? $career->rating,
                    'person' => $data['person'] ?? $career->person,
                ]);
            } else {
                $career = CareerDetail::create([
                    'user_id' => auth()->id(),
                    'headline' => $data['headline'] ?? null,
                    'career_description' => $data['career_description'] ?? null,
                    'work_experience_id' => isset($data['work_experience_ids']) ? $data['work_experience_ids'] : json_decode($data['work_experience_ids'], true),
                    'media' => $data['media'] ?? null,
                    'skills_id' => $data['skills_id'] ?? null,
                    'rating' => $data['rating'] ?? null,
                    'person' => $data['person'] ?? 'public',
                ]);
            }

            // Sync work experiences if provided
            // if (isset($data['work_experience_ids']) && is_array($data['work_experience_ids'])) {
            //     // Validate that all work experiences belong to the same user
            //     $workExperienceIds = $data['work_experience_ids'];
            //     $validExperiences = WorkExperience::where('user_id', auth()->id())
            //         ->whereIn('id', $workExperienceIds)
            //         ->pluck('id')
            //         ->toArray();

            //     // Update the career_detail's work_experience_id field
            //     $career->update([
            //         'work_experience_id' => json_encode($validExperiences)
            //     ]);
            // } else {
            //     // If no work experiences provided, set to empty array
            //     $career->update([
            //         'work_experience_id' => json_encode([])
            //     ]);
            // }

            return $career->fresh();
        });
    }

    /**
     * Get all career details for the authenticated user
     *
     * @param  array  $filters
     * @return Collection
     */
    public function getCareers()
    {
        $query = CareerDetail::with(['user', 'workExperiences' => function ($query) {
            $query->orderBy('start_date', 'desc');
        }]);

        $query->where('user_id', Auth::id());

        // Filter by person visibility
        // if (isset($filters['person'])) {
        //     $query->where('person', $filters['person']);
        // }

        // // Filter by skills
        // if (isset($filters['skills_id'])) {
        //     $query->where('skills_id', $filters['skills_id']);
        // }

        // // Sort
        // $sortBy = $filters['sort_by'] ?? 'created_at';
        // $sortOrder = $filters['sort_order'] ?? 'desc';
        // $query->orderBy($sortBy, $sortOrder);

        return $query->get();
    }

    /**
     * Get a single career detail by ID
     */
    public function getCareerById(int $careerId): CareerDetail
    {
        return CareerDetail::with(['user', 'workExperiences' => function ($query) {
            $query->orderBy('start_date', 'desc');
        }])->findOrFail($careerId);
    }

    /**
     * Delete career details
     */
    public function deleteCareer(int $careerId): bool
    {
        $career = CareerDetail::where('user_id', Auth::id())
            ->findOrFail($careerId);

        return $career->delete();
    }

    /**
     * Get work experiences for a career
     *
     * @return Collection
     */
    public function getWorkExperiencesByCareer(int $careerId)
    {
        $career = CareerDetail::with(['workExperiences' => function ($query) {
            $query->orderBy('start_date', 'desc');
        }])->where('user_id', auth()->id())
            ->findOrFail($careerId);

        return $career->workExperiences;
    }

    /**
     * Check if user owns the career detail
     */
    public function isCareerOwner(int $careerId): bool
    {
        return CareerDetail::where('id', $careerId)
            ->where('user_id', auth()->id())
            ->exists();
    }
}
