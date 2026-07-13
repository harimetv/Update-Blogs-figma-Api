<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Skill;
use App\Models\SocialMediaCategory;
use App\Models\Study;
use App\Models\Religion;
use App\Models\Country;
use App\Models\Cast;
use \App\Models\Gotra;
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

    public function getReligions()
    {
        $religions = Religion::select('id', 'name', 'code')->get();

        return $this->successResponse('Fetch religions successful', $religions);
    }

    public function getCountry()
    {
        $countries = Country::with('city')->select('id', 'name')->get();

        return $this->successResponse('Fetch countries successful', $countries);
    }

    public function getCasts()
    {
        $casts = Cast::select('id', 'name')->get();

        return $this->successResponse('Fetch casts successful', $casts);
    }

    public function getGotras()
    {
        $gotras = Gotra::select('id', 'name')->get();

        return $this->successResponse('Fetch gotras successful', $gotras);
    }
}
