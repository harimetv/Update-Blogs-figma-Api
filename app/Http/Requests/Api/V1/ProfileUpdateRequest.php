<?php

namespace App\Http\Requests\Api\V1;

use App\Constants\AppMediaConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = request()->attributes->get('user')->id;
        return [
            'person' => ['nullable', Rule::in(array_keys(getConstants()['person'] ?? []))],
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable',
            'username' => 'nullable|string|max:255|unique:profiles,username,' . $userId . ',user_id',
            'gender' => 'nullable|in:male,female,other',
            'dob' => 'nullable|date|before:today',
            'headline' => 'nullable|string|max:255',
            'bio' => 'required|string|max:2000',   // changed from 'bio'
            'image' => [                            // changed from 'profile_image'
                'nullable',
                'image',
                'mimes:' . implode(',', AppMediaConstant::ALLOWED_IMAGE_MIMES),
                'max:' . AppMediaConstant::imageSizeKB(),
            ],
            'banner' => [
                'nullable',
                'image',
                'mimes:' . implode(',', AppMediaConstant::ALLOWED_IMAGE_MIMES),
                'max:' . AppMediaConstant::imageSizeKB(),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.max' => 'First name cannot exceed 255 characters.',
            'last_name.max' => 'Last name cannot exceed 255 characters.',
            'headline.max' => 'Headline cannot exceed 255 characters.',
            'bios.max' => 'Bio section cannot exceed 2000 characters.',
            'gender.in' => 'Gender must be male, female, or other.',
            'dob.date' => 'Date of birth must be a valid date.',
            'dob.before' => 'Date of birth cannot be in the future.',
            'email.email' => 'Please enter a valid email address.',
            'username.unique' => 'This username is already taken.',
            'image.image' => 'Profile image must be a valid image file.',
            'image.mimes' => 'Profile image must be one of: JPG, JPEG, PNG, GIF, WEBP.',
            'image.max' => 'Profile image may not be larger than ' . AppMediaConstant::MAX_IMAGE_SIZE_MB . 'MB.',
            'banner.image' => 'Banner must be a valid image file.',
            'banner.mimes' => 'Banner must be one of: JPG, JPEG, PNG, GIF, WEBP.',
            'banner.max' => 'Banner may not be larger than ' . AppMediaConstant::MAX_IMAGE_SIZE_MB . 'MB.',
        ];
    }
}
