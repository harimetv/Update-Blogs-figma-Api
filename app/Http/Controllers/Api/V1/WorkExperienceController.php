<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\WorkExperienceRequest;
use App\Services\WorkExperienceService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    protected WorkExperienceService $workExperienceService;

    public function __construct(WorkExperienceService $workExperienceService)
    {
        $this->workExperienceService = $workExperienceService;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $result = $this->workExperienceService->getUserWorkExperiences();

            if ($result['success']) {
                return $this->successResponse(
                    $result['message'],
                    $result['data']
                );
            }

            return $this->errorResponse(
                $result['message'],
                'FETCH_ERROR',
                400,
                ['error' => $result['error'] ?? null]
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch work experiences');
        }
    }

    public function store(WorkExperienceRequest $request): JsonResponse
    {
        try {
            if (! empty($request->work_experience_id)) {
                $result = $this->workExperienceService->updateWorkExperience($request->work_experience_id, $request->validated());
            } else {
                $result = $this->workExperienceService->createWorkExperience($request->validated());
            }

            if ($result['success']) {
                return $this->successResponse(
                    $result['message'],
                    $result['data'],
                    201
                );
            }

            return $this->errorResponse(
                $result['message'],
                'CREATE_ERROR',
                400,
                ['error' => $result['error'] ?? null]
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to create work experience');
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            $result = $this->workExperienceService->getWorkExperience($id);

            if ($result['success']) {
                return $this->successResponse(
                    $result['message'],
                    $result['data']
                );
            }

            return $this->errorResponse(
                $result['message'],
                'NOT_FOUND',
                404,
                ['error' => $result['error'] ?? null]
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to fetch work experience');
        }
    }

    public function update(WorkExperienceRequest $request, int $id): JsonResponse
    {
        try {
            $result = $this->workExperienceService->updateWorkExperience($id, $request->validated());

            if ($result['success']) {
                return $this->successResponse(
                    $result['message'],
                    $result['data']
                );
            }

            $statusCode = str_contains($result['message'], 'not found') ? 404 : 400;

            return $this->errorResponse(
                $result['message'],
                'UPDATE_ERROR',
                $statusCode,
                ['error' => $result['error'] ?? null]
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to update work experience');
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        try {
            $result = $this->workExperienceService->deleteWorkExperience($request->id);

            if ($result['success']) {
                return $this->successResponse(
                    $result['message'],
                    null
                );
            }

            $statusCode = str_contains($result['message'], 'not found') ? 404 : 400;

            return $this->errorResponse(
                $result['message'],
                'DELETE_ERROR',
                $statusCode,
                ['error' => $result['error'] ?? null]
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to delete work experience');
        }
    }
}
