<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class EducationUpdateRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'             => ['required', 'integer', 'exists:educations,id'],
            'institution'    => ['sometimes', 'string', 'max:255'],
            'degree'         => ['nullable', 'string', 'max:255'],
            'field_of_study' => ['nullable', 'string', 'max:255'],
            'start_date'     => ['nullable', 'date'],
            'end_date'       => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current'     => ['boolean'],
            'description'    => ['nullable', 'string', 'max:2000'],
            'document'       => ['nullable', 'string', 'max:255'],
            'order'          => ['integer', 'min:0'],
            'visibility'     => ['in:public,private'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'             => 'Education ID is required.',
            'id.integer'              => 'Education ID must be a valid integer.',
            'id.exists'               => 'The selected education record does not exist.',

            'institution.string'      => 'Institution must be valid text.',
            'institution.max'         => 'Institution name cannot exceed 255 characters.',

            'degree.string'           => 'Degree must be valid text.',
            'degree.max'              => 'Degree cannot exceed 255 characters.',

            'field_of_study.string'   => 'Field of study must be valid text.',
            'field_of_study.max'      => 'Field of study cannot exceed 255 characters.',

            'start_date.date'         => 'Start date must be a valid date.',
            'end_date.date'           => 'End date must be a valid date.',
            'end_date.after_or_equal' => 'End date cannot be before start date.',

            'is_current.boolean'      => 'Current status must be true or false.',

            'description.string'      => 'Description must be valid text.',
            'description.max'         => 'Description cannot exceed 2000 characters.',

            'document.string'         => 'Document must be a valid string (like a file path).',
            'document.max'            => 'Document path cannot exceed 255 characters.',

            'order.integer'           => 'Order must be an integer.',
            'order.min'               => 'Order must be zero or greater.',

            'visibility.in'           => 'Visibility must be either public or private.',
        ];
    }
}
