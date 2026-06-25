<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CareerRequest;
use App\Http\Resources\V1\CareerResource;
use App\Http\Resources\V1\WorkExperienceResource;
use App\Models\CareerDetail;
use App\Services\CareerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CareerController extends Controller
{
    protected CareerService $careerService;

    protected $user;
    protected $userId;
    public function __construct(CareerService $careerService)
    {
        $this->careerService = $careerService;
        $this->user = request()->attributes->get('user');
        $this->userId = $this->user->id;
    }

    /**
     * Add or Update Career Details
     *
     * @return JsonResponse
     */
    public function storeOrUpdate(CareerRequest $request)
    {
        try {
            $careerId = $request->career_id;
            if ($careerId && ! $this->careerService->isCareerOwner($careerId)) {
                return $this->errorResponse(
                    'You are not authorized to update this career detail.',
                    'UNAUTHORIZED',
                    403
                );
            }

            $career = $this->careerService->saveCareer($request->validated(), $careerId);

            $message = $careerId ? 'Career details updated successfully' : 'Career details created successfully';

            return $this->successResponse(
                $message,$career
                // new CareerResource($career->load(['workExperiences']))
            );
        } catch (\Exception $e) {
            Log::error('Career store/update error: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return $this->handleException($e, 'Failed to save career details');
        }
    }

    /**
     * Get all career details
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            // $filters = $request->only(['user_id', 'person', 'skills_id', 'sort_by', 'sort_order']);

            // // If user_id is not provided, get current user's careers
            // if (!isset($filters['user_id'])) {
            //     $filters['user_id'] = auth()->id();
            // }

            // $careers = $this->careerService->getCareers();
            // $careers = CareerDetail::with(['workExperiences' => function ($query) {
            //     $query->orderBy('start_date', 'desc');
            // }])->get();
            // $careers = CareerDetail::with('workExperience')->where('user_id', Auth::id())->get();
            $careers = CareerDetail::where('user_id', $this->userId)->get();

            return $this->successResponse(
                'Career details retrieved successfully', $careers
                // CareerResource::collection($careers)
            );
        } catch (\Exception $e) {
            Log::error('Career index error: '.$e->getMessage());

            return $this->handleException($e, 'Failed to retrieve career details');
        }
    }

    /**
     * Get single career detail
     *
     * @return JsonResponse
     */
    public function show(int $careerId)
    {
        try {
            // $career = $this->careerService->getCareerById($careerId);
            $career = CareerDetail::where('user_id', $this->userId)->where('id', $careerId)->first();
            // Check if user can view this career
            // if ($career->user_id !== auth()->id() && $career->person === 'onlyme') {
            //     return $this->errorResponse(
            //         'You are not authorized to view this career detail.',
            //         'UNAUTHORIZED',
            //         403
            //     );
            // }

            return $this->successResponse(
                'Career detail retrieved successfully', $career
                // new CareerResource($career->load(['user', 'workExperiences']))
            );
        } catch (\Exception $e) {
            Log::error('Career show error: '.$e->getMessage());

            return $this->handleException($e, 'Failed to retrieve career detail');
        }
    }

    /**
     * Delete career details
     *
     * @return JsonResponse
     */
    public function deleteCareer(Request $request)
    {
        $careerId = $request->input('career_id');
        try {

            $career = CareerDetail::where('user_id', $this->userId)->where('id', $careerId)
                ->first();

            if (empty($career)) {
                return $this->errorResponse(
                    'Career detail not found.',
                    'NOT_FOUND',
                    404
                );
            }

            $career->delete();

            return $this->successResponse(
                'Career details deleted successfully', null
            );
        } catch (\Exception $e) {
            Log::error('Career delete error: '.$e->getMessage());

            return $this->handleException($e, 'Failed to delete career details');
        }
    }

    /**
     * Get work experiences for a career
     *
     * @return JsonResponse
     */
    public function getWorkExperiences(int $careerId)
    {
        try {
            $workExperiences = $this->careerService->getWorkExperiencesByCareer($careerId);

            return $this->successResponse(
                'Work experiences retrieved successfully',
                WorkExperienceResource::collection($workExperiences)
            );
        } catch (\Exception $e) {
            Log::error('Get work experiences error: '.$e->getMessage());

            return $this->handleException($e, 'Failed to retrieve work experiences');
        }
    }
}
