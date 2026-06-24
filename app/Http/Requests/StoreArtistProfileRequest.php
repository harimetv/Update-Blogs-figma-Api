<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArtistProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'visibility'       => 'required|in:public,connections,custom_friends,only_me',

            'gender'           => 'nullable|in:male,female,other',
            'bust_chest'       => 'nullable|string|max:50',
            'hip'              => 'nullable|string|max:50',
            'eye_color'        => 'nullable|string|max:50',
            'hair_color'       => 'nullable|string|max:50',
            'body_type'        => 'nullable|string|max:50',

            'interestes_in'    => 'nullable|array',
            'interestes_in.*'  => 'string|max:50',

            'comfortable_in'   => 'nullable|array',
            'comfortable_in.*' => 'string|max:50',

            'languages'        => 'nullable|array',
            'languages.*'      => 'string|max:50',

            'phone_number'     => 'nullable|string|min:8|max:20',
            'bio'              => 'nullable|string|max:2000',

            'managed_by'       => 'nullable|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'visibility.required'  => 'Visibility is required.',
            'visibility.in'        => 'Invalid visibility selected.',
            'interestes_in.array'  => 'Artist interests must be an array.',
            'comfortable_in.array' => 'Comfort options must be an array.',
            'languages.array'      => 'Languages must be an array.',
            'phone_number.min'     => 'Phone number is too short.',
            'phone_number.max'     => 'Phone number is too long.',
        ];
    }
}
