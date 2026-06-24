<?php
namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserLifestyleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // visibility
            'visibility'  => 'required|in:public,connections,custom_friends,only_me',

            // languages (array of IDs)
            'languages'   => 'nullable|array',
            'languages.*' => 'required|integer|exists:languages,id',

            // hobbies (array of IDs)
            'hobbies'     => 'nullable|array',
            'hobbies.*'   => 'required|integer|exists:hobbies,id',

            // habits
            'diet'        => 'nullable|in:vegetarian,non_vegetarian,eggetarian',
            'drinking'    => 'nullable|in:yes,no,occasionally',
            'smoking'     => 'nullable|in:yes,no,occasionally',

            // assets
            'own_house'   => 'required|boolean',
            'own_car'     => 'required|boolean',

            // food / cooking
            'food_cook'   => 'nullable|array',
            'food_cook.*' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'visibility.required' => 'Visibility is required.',
            'visibility.in'       => 'Invalid visibility option selected.',

            'languages.array'     => 'Languages must be an array.',
            'languages.*.integer' => 'Each language must be a valid ID.',
            'languages.*.exists'  => 'Selected language does not exist.',

            'hobbies.array'       => 'Hobbies must be an array.',
            'hobbies.*.integer'   => 'Each hobby must be a valid ID.',
            'hobbies.*.exists'    => 'Selected hobby does not exist.',

            'diet.in'             => 'Invalid diet option.',
            'drinking.in'         => 'Invalid drinking option.',
            'smoking.in'          => 'Invalid smoking option.',

            'own_house.required'  => 'Own house field is required.',
            'own_house.boolean'   => 'Own house must be true or false.',

            'own_car.required'    => 'Own car field is required.',
            'own_car.boolean'     => 'Own car must be true or false.',

            'food_cook.array'     => 'Food cook must be an array.',
        ];
    }

    protected function prepareForValidation(): void
    {
        // handle checkbox / radio values coming as "1", "0", "true", "false"
        $this->merge([
            'own_house' => filter_var($this->own_house, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
            'own_car'   => filter_var($this->own_car, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE),
        ]);
    }
}
