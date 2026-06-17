<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseFormRequest;

class GenerateOtpRequest extends BaseFormRequest
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
            'token' => 'required|string|exists:password_reset_tokens,token',
            // ensures token exists in DB
        ];
    }
    public function messages()
    {
        return [
            'token.required' => 'Verification token is required.',
            'token.string' => 'Invalid token format.',
            'token.exists' => 'The verification link is invalid. Please request a new one.',
        ];
    }
}
