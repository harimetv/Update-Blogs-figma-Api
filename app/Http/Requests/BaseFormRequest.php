<?php

namespace App\Http\Requests;

use App\Traits\ApiResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


abstract class BaseFormRequest extends FormRequest
{
    use ApiResponse;


    // 'hashtag_id' => 'required|exists:hashtags,id',
    // 'user_id'    => 'nullable|required_without:company_id|exists:users,id',
    // 'company_id' => 'nullable|required_without:user_id|exists:companies,id',

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Return consistent JSON for failed validation using ApiResponse trait
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        $message = $errors->first();
        if ($errors->count() > 1) {
            $message .= ' (and ' . ($errors->count() - 1) . ' more errors)';
        }
        throw new HttpResponseException(
            $this->errorResponse(
                $message,
                'VALIDATION_ERROR',
                422,
                $validator->errors()
            )
        );
    }
}
