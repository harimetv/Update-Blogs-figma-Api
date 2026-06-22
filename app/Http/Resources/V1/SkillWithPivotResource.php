<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SkillWithPivotResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'skill_category_id' => $this->skill_category_id,
            'percentage' => $this->pivot->percentage ?? null,
        ];
    }
}
