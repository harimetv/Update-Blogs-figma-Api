<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class AddressIdRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->route('id') && !$this->has('id')) {
            $this->merge(['id' => $this->route('id')]);
        }
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:addresses,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required' => 'Address ID is required.',
            'id.integer'  => 'Address ID must be a number.',
            'id.exists'   => 'Address record not found.',
        ];
    }
}
