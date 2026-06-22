<?php

namespace App\Services;

use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkExperienceService
{
    public function getUserWorkExperiences(): array
    {
        try {
            $user = Auth::user();
            $experiences = WorkExperience::with('industry')->where('user_id', $user->id)
                ->orderBy('is_current', 'desc')
                ->orderBy('start_date', 'desc')
                ->get();

            return [
                'success' => true,
                'data' => $experiences,
                'message' => 'Work experiences retrieved successfully',
            ];
        } catch (\Exception $e) {
            Log::error('Error retrieving work experiences: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to retrieve work experiences',
                'error' => $e->getMessage(),
            ];
        }
    }

    public function createWorkExperience(array $data): array
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();

            $data['is_current'] = $data['is_current'] ?? empty($data['end_date']);
            $data['user_id'] = $user->id;

            if ($data['is_current']) {
                $data['end_date'] = null;
            }

            $workExperience = WorkExperience::create($data);

            DB::commit();

            return [
                'success' => true,
                'data' => $workExperience,
                'message' => 'Work experience added successfully',
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error creating work experience: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to create work experience',
                'error' => $e->getMessage(),
            ];
        }
    }

    public function updateWorkExperience(int $id, array $data): array
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $workExperience = WorkExperience::where('user_id', $user->id)
                ->findOrFail($id);

            // Handle is_current logic
            $data['is_current'] = $data['is_current'] ?? empty($data['end_date']);

            if ($data['is_current']) {
                $data['end_date'] = null;
            }

            $workExperience->update($data);

            DB::commit();

            return [
                'success' => true,
                'data' => $workExperience->fresh(),
                'message' => 'Work experience updated successfully',
            ];
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Work experience not found',
                'error' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating work experience: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to update work experience',
                'error' => $e->getMessage(),
            ];
        }
    }

    public function deleteWorkExperience(int $id): array
    {
        try {
            DB::beginTransaction();

            $user = Auth::user();
            $workExperience = WorkExperience::where('user_id', $user->id)
                ->findOrFail($id);

            $workExperience->delete();

            DB::commit();

            return [
                'success' => true,
                'message' => 'Work experience deleted successfully',
            ];
        } catch (ModelNotFoundException $e) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Work experience not found',
                'error' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting work experience: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to delete work experience',
                'error' => $e->getMessage(),
            ];
        }
    }

    public function getWorkExperience(int $id): array
    {
        try {
            $user = Auth::user();
            $workExperience = WorkExperience::where('user_id', $user->id)
                ->findOrFail($id);

            return [
                'success' => true,
                'data' => $workExperience,
                'message' => 'Work experience retrieved successfully',
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'success' => false,
                'message' => 'Work experience not found',
                'error' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            Log::error('Error retrieving work experience: '.$e->getMessage());

            return [
                'success' => false,
                'message' => 'Failed to retrieve work experience',
                'error' => $e->getMessage(),
            ];
        }
    }
}
