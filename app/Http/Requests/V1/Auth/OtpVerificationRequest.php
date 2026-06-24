<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseFormRequest;

class OtpVerificationRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true; // set to false if you want to restrict
    }

    public function rules(): array
    {
        return [
            'code'        => 'required|digits:6',
            'token'      => 'required|string|exists:password_reset_tokens,token',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required'        => 'Code is required for verification.',
            'code.digits'          => 'Code must be exactly 6 digits.',

            'token.required'      => 'Verification token is required.',
            'token.exists'        => 'The provided token is invalid or expired.',
        ];
    }
}
