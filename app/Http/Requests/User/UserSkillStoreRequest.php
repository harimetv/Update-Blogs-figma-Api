<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class UserSkillStoreRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'skill_id'           => ['required', 'integer', 'exists:skills,id'],
            'endorsements_count' => ['integer', 'min:0'],
            'is_verified'        => ['boolean'],
            'visibility'         => ['required', 'in:public,private'],
            'order'              => ['integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'skill_id.required'          => 'Skill ID is required.',
            'skill_id.integer'           => 'Skill ID must be an integer.',
            'skill_id.exists'            => 'The selected skill does not exist.',

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
