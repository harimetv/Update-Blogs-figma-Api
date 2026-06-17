<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseFormRequest;

class ResendOtpRequest extends BaseFormRequest
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
            'token' => [
                'required',
                'string',
                'exists:password_reset_tokens,token'
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'Verification token is required.',
            'token.exists' => 'The provided verification token is invalid or has expired.',
        ];
    }
}
