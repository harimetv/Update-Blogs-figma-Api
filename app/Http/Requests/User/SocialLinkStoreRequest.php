<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;

class SocialLinkStoreRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true; // auth handled by middleware
    }

    public function rules(): array
    {
        return [
            'platform'   => ['required', 'string', 'max:255'],
            'url'        => ['required', 'string', 'max:2048', 'url'],
            'is_visible' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'platform.required'  => 'Platform is required (e.g. LinkedIn, Twitter, GitHub).',
            'platform.string'    => 'Platform must be valid text.',
            'platform.max'       => 'Platform cannot exceed 255 characters.',

            'url.required'       => 'Profile URL is required (e.g. https://twitter.com/username).',
            'url.string'         => 'URL must be valid text.',
            'url.max'            => 'URL is too long.',
            'url.url'            => 'Please provide a valid URL, including http:// or https://.',

            'is_visible.boolean' => 'is_visible must be true or false.',
        ];
    }
}
