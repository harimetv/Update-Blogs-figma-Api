<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkExperienceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $employmentTypes = getConstants()['employment_types'] ?? [];

        return [
            'id' => $this->id,
            'organization_name' => $this->organization_name,
            'job_title' => $this->job_title,
            'employment_type' => $this->employment_type,
            'employment_type_label' => $employmentTypes[$this->employment_type] ?? $this->employment_type,
            'location' => $this->location,
            'description' => $this->description,
            'start_date' => $this->start_date?->toDateString(),
            'end_date' => $this->end_date?->toDateString(),
            'industry_id' => $this->industry_id,
            'industry' => $this->whenLoaded('industry', function () {
                return [
                    'id' => $this->industry->id,
                    'name' => $this->industry->name,
                ];
            }),
            'is_current' => (bool) $this->is_current,
            'created_at' => $this->created_at?->toDateTimeString(),
            'updated_at' => $this->updated_at?->toDateTimeString(),
        ];
    }
}
