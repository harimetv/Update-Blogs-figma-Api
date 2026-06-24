<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class AddressStoreRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type'        => ['required', 'in:home,office,billing,shipping'],
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
        return [
            'type.required'      => 'Address type is required and must be one of: home, office, billing, shipping.',
            'type.in'            => 'Address type must be one of: home, office, billing, shipping.',

            'label.string'       => 'Label must be a valid text.',
            'label.max'          => 'Label cannot exceed 100 characters.',

            'street.string'      => 'Street must be valid text.',
            'street.max'         => 'Street cannot exceed 255 characters.',

            'landmark.string'    => 'Landmark must be valid text.',
            'landmark.max'       => 'Landmark cannot exceed 255 characters.',

            'city.string'        => 'City must be valid text.',
            'city.max'           => 'City cannot exceed 100 characters.',

            'state.string'       => 'State must be valid text.',
            'state.max'          => 'State cannot exceed 100 characters.',

            'country.string'     => 'Country must be valid text.',
            'country.max'        => 'Country cannot exceed 100 characters.',

            'postal_code.string' => 'Postal code must be valid text.',
            'postal_code.max'    => 'Postal code cannot exceed 20 characters.',

            'is_default.boolean' => 'is_default must be true or false.',
            'visibility.in'      => 'Visibility must be one of: ' . implode(', ', visibilities()),

            'order.integer'      => 'Order must be an integer.',
            'order.min'          => 'Order must be zero or greater.',
        ];
    }
}
