<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class SocialLinkIdRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->route('id') && ! $this->has('id')) {
            $this->merge(['id' => $this->route('id')]);
        }
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:social_links,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Social link ID is required.',
            'id.integer'  => 'Social link ID must be a number.',
            'id.exists'   => 'Social link not found.',
        ];
    }
}
