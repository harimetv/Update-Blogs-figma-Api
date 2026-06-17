<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseFormRequest;

class UserSignupRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'first_name' => [
                'required',
                'string',
                'min:2',
                'max:50',
                'regex:/^[A-Za-z]+$/'
            ],

            'last_name' => [
                'nullable',
                'string',
                'min:2',
                'max:50',
                'regex:/^[A-Za-z]+$/'
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:users,email'
            ],

            'username' => [
                'required',
                'string',
                'min:3',
                'max:30',
                'regex:/^[a-zA-Z0-9_]+$/',
                'unique:users,username'
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).+$/'
            ],

            'referral_code' => [
                'nullable',
                'string',
                'max:50',
                'exists:users,referral_code'
            ],
        ];
    }

    public function messages(): array
    {
        return [

            // First Name
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a valid string.',
            'first_name.min' => 'First name must be at least 2 characters.',
            'first_name.max' => 'First name cannot exceed 50 characters.',
            'first_name.regex' => 'First name can only contain letters (A-Z).',

            // Last Name
            'last_name.string' => 'Last name must be a valid string.',
            'last_name.min' => 'Last name must be at least 2 characters.',
            'last_name.max' => 'Last name cannot exceed 50 characters.',
            'last_name.regex' => 'Last name can only contain letters (A-Z).',

            // Email
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'email.unique' => 'This email address is already registered.',

            // Username
            'username.required' => 'Username is required.',
            'username.string' => 'Username must be a valid string.',
            'username.min' => 'Username must be at least 3 characters.',
            'username.max' => 'Username cannot exceed 30 characters.',
            'username.regex' => 'Username may only contain letters, numbers, and underscore.',
            'username.unique' => 'This username is already taken.',

            // Password
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a valid string.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password cannot exceed 32 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',

            // Referral Code
            'referral_code.string' => 'Referral code must be a valid string.',
            'referral_code.max' => 'Referral code cannot exceed 50 characters.',
            'referral_code.exists' => 'The referral code you entered is invalid.',
        ];
    }
}
