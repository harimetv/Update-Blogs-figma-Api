<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationDetailResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'school_name' => $this->school_name,
            'college_name' => $this->college_name,
            'study_id' => $this->study_id,
            'study' => new StudyResource($this->whenLoaded('study')),
            'start_date' => $this->start_date?->toDateString(),
            'end_date' => $this->end_date?->toDateString(),
            'media' => $this->media,
            'city_id' => $this->city_id,
            'grade' => $this->grade,
            'description' => $this->description,
            'status' => $this->status,
            'skills' => $this->whenLoaded('skills', function () {
                return $this->skills->map(function ($skill) {
                    return [
                        'skill' => $skill->skill,
                        'percentage' => $skill->percentage,
                    ];
                });
            }),
            'city' => new CityResource($this->whenLoaded('city')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
