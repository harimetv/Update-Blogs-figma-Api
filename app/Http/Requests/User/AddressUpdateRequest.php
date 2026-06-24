<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class AddressUpdateRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        // if route has {id} and body doesn't, you can merge it here
        if ($this->route('id') && ! $this->has('id')) {
            $this->merge(['id' => $this->route('id')]);
        }
    }

    public function rules(): array
    {
        return [
            'id'          => ['required', 'integer', 'exists:addresses,id'],
            'type'        => ['sometimes', 'in:home,office,billing,shipping'],
            'label'       => ['nullable', 'string', 'max:100'],
            'street'      => ['nullable', 'string', 'max:255'],
            'landmark'    => ['nullable', 'string', 'max:255'],
            'city'        => ['nullable', 'string', 'max:100'],
            'state'       => ['nullable', 'string', 'max:100'],
            'country'     => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'is_default'  => ['boolean'],
            'visibility'  => ['required', 'in:' . implode(',', visibilities())],
            'order'       => ['integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return array_merge([
            'id.required' => 'Address ID is required for update.',
            'id.integer'  => 'Address ID must be a valid number.',
            'id.exists'   => 'Address record not found.',
        ], (new AddressStoreRequest())->messages());
    }
}
