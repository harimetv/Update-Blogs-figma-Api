<?php
namespace App\Http\Requests;


class UpdateProfileImageRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // 2MB
            'banner'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096', // 4MB
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Profile picture must be an image file.',
            'image.mimes' => 'Profile picture must be JPG, JPEG, PNG, or WEBP.',
            'image.max'   => 'Profile picture size must not exceed 2MB.',

            'banner.image'  => 'Banner image must be an image file.',
            'banner.mimes'  => 'Banner image must be JPG, JPEG, PNG, or WEBP.',
            'banner.max'    => 'Banner image size must not exceed 4MB.',
        ];
    }
}
