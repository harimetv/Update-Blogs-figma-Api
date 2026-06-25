<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CareerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'career_id' => 'nullable|exists:career_details,id',
            'headline' => 'required|string|max:255',
            'career_description' => 'required|string',
            'work_experience_ids' => 'nullable|array',
            'work_experience_ids.*' => 'exists:work_experiences,id',
            'media' => 'nullable|string|max:255',
            'skills' => 'nullable',
            'rating' => 'nullable|numeric|min:0|max:5',
            'person' => ['nullable', Rule::in(array_keys(getConstants()['person'] ?? []))],
        ];

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'career_id.exists' => 'The specified career detail does not exist.',
            'work_experience_ids.*.exists' => 'One or more work experiences do not exist.',
            // 'skills_id.exists' => 'The specified skill does not exist.',
            'person.in' => 'The person field must be one of: public, private, onlyme',
            'rating.numeric' => 'The rating must be a number.',
            'rating.min' => 'The rating must be at least 0.',
            'rating.max' => 'The rating cannot exceed 5.',
        ];
    }
}
