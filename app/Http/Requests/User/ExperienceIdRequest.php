<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class ExperienceIdRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:experiences,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Experience ID is required.',
            'id.integer'  => 'Experience ID must be a number.',
            'id.exists'   => 'Experience record not found.',
        ];
    }
}
