<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Skill;
use App\Models\SocialMediaCategory;
use App\Models\Study;

class CommonController extends Controller
{
    public function industries()
    {
        $industries = Industry::where('is_active', true)->get();

        return $this->successResponse('Fetch industries successful', $industries);
    }

    public function getConstants()
    {
        $getConstant = getConstants();

        return $this->successResponse('Fetch constants successful', $getConstant);
    }

    public function getPlatforms()
    {
        $platforms = SocialMediaCategory::where('status', true)->get();

        return $this->successResponse('Fetch platforms successful', $platforms);
    }

    public function getSkills()
    {
        $skills = Skill::where('is_approved', true)->get();

        return $this->successResponse('Fetch skills successful', $skills);
    }

    public function getStudy()
    {
        $study = Study::get();

        return $this->successResponse('Fetch study successful', $study);
    }
}
