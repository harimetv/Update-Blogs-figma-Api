<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class UserSkillIdRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:user_skills,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'User skill ID is required.',
            'id.integer'  => 'User skill ID must be an integer.',
            'id.exists'   => 'User skill not found.',
        ];
    }
}
