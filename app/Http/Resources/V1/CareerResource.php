<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CareerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'headline' => $this->headline,
            'career_description' => $this->career_description,
            'work_experiences' => WorkExperienceResource::collection($this->whenLoaded('workExperiences')),
            'media' => $this->media,
            'skills_id' => $this->skills_id,
            'rating' => $this->rating,
            'person' => $this->person,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
