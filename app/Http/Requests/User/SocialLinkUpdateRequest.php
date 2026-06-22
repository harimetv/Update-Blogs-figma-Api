<?php
namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class SocialLinkUpdateRequest extends BaseFormRequest
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
            'id'         => ['required', 'integer', 'exists:social_links,id'],
            'platform'   => ['sometimes', 'string', 'max:255'],
            'url'        => ['sometimes', 'string', 'max:2048', 'url'],
            'is_visible' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'id.required'        => 'Social link ID is required for update.',
            'id.integer'         => 'Social link ID must be a number.',
            'id.exists'          => 'Social link not found.',

            'platform.string'    => 'Platform must be valid text.',
            'platform.max'       => 'Platform cannot exceed 255 characters.',

            'url.string'         => 'URL must be valid text.',
            'url.max'            => 'URL is too long.',
            'url.url'            => 'Please provide a valid URL, including http:// or https://.',

            'is_visible.boolean' => 'is_visible must be true or false.',
        ];
    }
}
