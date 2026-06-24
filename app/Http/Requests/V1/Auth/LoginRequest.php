<?php

namespace App\Http\Requests\V1\Auth;

use App\Http\Requests\BaseFormRequest;

class LoginRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'identifier' => 'required|string',
            'password'   => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'identifier.required' => 'Please enter your email, phone number, or username.',
            'password.required'   => 'Password is required.',
            'password.min'        => 'Password must be at least 6 characters.',
        ];
    }

    public function getCredentials(): array
    {
        $identifier = $this->get('identifier');

        if ($this->isEmail($identifier)) {
            return ['email' => $identifier, 'password' => $this->get('password')];
        }

        if ($this->isPhoneNumber($identifier)) {
            return ['phone' => $identifier, 'password' => $this->get('password')];
        }

        return ['username' => $identifier, 'password' => $this->get('password')];
    }

    public function getLoginType(): string
    {
        $identifier = $this->get('identifier');

        if ($this->isEmail($identifier)) {
            return 'email';
        }

        if ($this->isPhoneNumber($identifier)) {
            return 'phone';
        }

        return 'username';
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
