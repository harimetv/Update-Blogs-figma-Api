<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class WorkExperienceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'work_experience_id' => ['nullable', 'exists:work_experiences,id'],
            'organization_name' => ['required', 'string', 'max:255'],
            'job_title' => ['required', 'string', 'max:255'],
            'employment_type' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'industry_id' => ['nullable', 'exists:industries,id'],
            'is_current' => ['boolean'],
        ];

        if ($this->input('is_current')) {
            $rules['end_date'] = ['nullable', 'prohibited'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'organization_name.required' => 'Organization name is required',
            'job_title.required' => 'Job title is required',
            'employment_type.required' => 'Employment type is required',
            'location.required' => 'Location is required',
            'start_date.required' => 'Start date is required',
            'start_date.before_or_equal' => 'Start date cannot be in the future',
            'end_date.after' => 'End date must be after start date',
            'end_date.before_or_equal' => 'End date cannot be in the future',
            'end_date.prohibited' => 'End date should not be provided for current position',
        ];
    }
}
