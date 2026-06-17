<?php

namespace App\Http\Requests\Auth\ForgotPassword;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends BaseFormRequest
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
            'identifier' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'identifier.required' => 'Please enter your email, phone number, or username.',
            'identifier.max' => 'The identifier may not be greater than 255 characters.',
        ];
    }

    public function getIdentifier(): array
    {
        $identifier = $this->get('identifier');

        if ($this->isEmail($identifier)) {
            return ['email' => $identifier];
        }

        if ($this->isPhoneNumber($identifier)) {
            return ['number' => $identifier];
        }

        return ['username' => $identifier];
    }

    private function isEmail(string $input): bool
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function isPhoneNumber(string $input): bool
    {
        return preg_match('/^\+?[0-9]{10,15}$/', $input);
    }
}
