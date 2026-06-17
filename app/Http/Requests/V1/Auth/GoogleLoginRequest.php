<?php
namespace App\Http\Requests\V1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class GoogleLoginRequest extends FormRequest
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
            'name'         => ['required', 'string', 'max:255'],
            'email'        => ['required', 'email', 'max:255'],
            'avatar'       => ['nullable', 'url', 'max:1000'],
            'provider'     => ['required', 'string', 'in:google,facebook,github,linkedin,twitter'],
            'provider_id'  => ['required', 'string', 'max:255'],
            'access_token' => ['nullable', 'string', 'max:2000'], // optional but recommended to verify
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'Name is required.',
            'name.string'          => 'Name must be a valid text value.',
            'name.max'             => 'Name must not exceed 255 characters.',

            'email.required'       => 'Email address is required.',
            'email.email'          => 'Provide a valid email address.',
            'email.max'            => 'Email must not exceed 255 characters.',

            'avatar.url'           => 'Avatar must be a valid URL.',
            'avatar.max'           => 'Avatar URL is too long.',

            'provider.required'    => 'Login provider is required.',
            'provider.in'          => 'Unsupported provider. Allowed: google, facebook, github, linkedin, twitter.',

            'provider_id.required' => 'Provider ID is required.',
            'provider_id.max'      => 'Provider ID must not exceed 255 characters.',

            'access_token.max'     => 'Access token length exceeds allowed limit.',
        ];
    }
}
