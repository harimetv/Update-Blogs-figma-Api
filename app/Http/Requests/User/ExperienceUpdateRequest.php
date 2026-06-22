<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class ExperienceUpdateRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'              => ['required', 'integer', 'exists:experiences,id'],
            'company'         => ['nullable', 'string', 'max:255'],
            'title'           => ['sometimes', 'string', 'max:255'],
            'employment_type' => ['nullable', 'in:Full-time,Part-time,Self-employed,Freelance,Internship,Trainee'],
            'source_of_hire'  => ['nullable', 'in:LinkedIn,Company website,Indeed,Other job sites,Referral,Contacted by recruiter,Staffing agency,Other'],
            'headline'        => ['nullable', 'string', 'max:500'],
            'description'     => ['nullable', 'string', 'max:2000'],
            'start_date'      => ['nullable', 'date'],
            'end_date'        => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_current'      => ['boolean'],
            'location'        => ['nullable', 'string', 'max:255'],
            'location_type'   => ['nullable', 'in:On-Site,Hybrid,Remote'],
            'document'        => ['nullable', 'string', 'max:255'],
            'order'           => ['integer', 'min:0'],
            'visibility'      => ['in:public,private'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'        => 'Experience ID is required.',
            'id.integer'         => 'Experience ID must be an integer.',
            'id.exists'          => 'Experience record not found.',
            'title.string'       => 'Title must be valid text.',
            'title.max'          => 'Title cannot exceed 255 characters.',
            'employment_type.in' => 'Employment type must be a valid option.',
            'source_of_hire.in'  => 'Invalid source of hire selected.',
            'visibility.in'      => 'Visibility must be either public or private.',
        ];
    }
}
