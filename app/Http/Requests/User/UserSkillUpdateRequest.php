<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class UserSkillUpdateRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'                 => ['required', 'integer', 'exists:user_skills,id'],
            'endorsements_count' => ['integer', 'min:0'],
            'is_verified'        => ['boolean'],
            'visibility'         => ['required', 'in:public,private'],
            'order'              => ['integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'                => 'User skill ID is required.',
            'id.integer'                 => 'User skill ID must be an integer.',
            'id.exists'                  => 'User skill not found.',

            'endorsements_count.integer' => 'Endorsement count must be an integer.',
            'endorsements_count.min'     => 'Endorsement count cannot be negative.',

            'is_verified.boolean'        => 'Verification status must be true or false.',

            'visibility.required'        => 'Visibility is required.',
            'visibility.in'              => 'Visibility must be either public or private.',

            'order.integer'              => 'Order must be an integer.',
            'order.min'                  => 'Order must be zero or greater.',
        ];
    }
}
