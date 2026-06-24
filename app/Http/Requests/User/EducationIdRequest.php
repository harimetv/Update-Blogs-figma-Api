<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class EducationIdRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // Auto-merge route parameter into request data if needed
        if ($this->route('id') && ! $this->has('id')) {
            $this->merge(['id' => $this->route('id')]);
        }
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:educations,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Education ID is required.',
            'id.integer'  => 'Education ID must be a valid integer.',
            'id.exists'   => 'The selected education record does not exist.',
        ];
    }
}
