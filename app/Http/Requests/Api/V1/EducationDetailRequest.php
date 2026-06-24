<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class EducationDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // adjust if needed
    }

    public function rules(): array
    {
        $rules = [
            'school_name' => 'required|string|max:255',
            'college_name' => 'required|string|max:255',
            'study_id' => 'nullable|exists:studies,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'media' => 'nullable|string|max:255', // maybe file path
            'city_id' => 'nullable|string|max:255', // or integer if cities table
            'grade' => 'nullable|string|max:50',
            'description' => 'nullable|string',
            'status' => ['nullable', Rule::in(['public', 'private', 'onlyme'])],
            'skills' => 'nullable|array',
            'skills.*.id' => 'nullable|exists:skills,id', // to allow updating existing pivot? For sync we can just send skill_id and percentage
            'skills.*.skill_id' => 'required_with:skills|exists:skills,id',
            'skills.*.percentage' => 'nullable|integer|min:0|max:100',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'end_date.after_or_equal' => 'End date must be after or equal to start date.',
        ];
    }
}
