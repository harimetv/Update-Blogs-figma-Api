<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class ExperienceStoreRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company'         => ['nullable', 'string', 'max:255'],
            'title'           => ['required', 'string', 'max:255'],
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
            'visibility'      => ['required', 'in:public,private'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'          => 'Job title is required.',
            'title.string'            => 'Job title must be text.',
            'title.max'               => 'Job title cannot exceed 255 characters.',

            'employment_type.in'      => 'Employment type must be a valid option.',
            'source_of_hire.in'       => 'Invalid source of hire selected.',

            'start_date.date'         => 'Start date must be valid.',
            'end_date.date'           => 'End date must be valid.',
            'end_date.after_or_equal' => 'End date must be after or equal to the start date.',

            'is_current.boolean'      => 'Current status must be true or false.',

            'description.max'         => 'Description cannot exceed 2000 characters.',
            'headline.max'            => 'Headline cannot exceed 500 characters.',

            'location.max'            => 'Location cannot exceed 255 characters.',
            'location_type.in'        => 'Location type must be On-Site, Hybrid, or Remote.',

            'visibility.required'     => 'Visibility is required.',
            'visibility.in'           => 'Visibility must be either public or private.',
        ];
    }
}
