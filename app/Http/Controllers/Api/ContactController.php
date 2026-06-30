<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use Illuminate\Support\Facades\Validator;
class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'message'      => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse(
                'Validation failed.',
                'VALIDATION_ERROR',
                422,
                $validator->errors()
            );
        }

        try {
            $data = $validator->validated();
            if ($request->user()) {
                $data['user_id'] = $request->user()->id;
            }

            $submission = ContactInfo::create($data);

            return $this->successResponse(
                'Profile submitted successfully.',
                $submission,
                201
            );
        } catch (\Exception $e) {
            return $this->handleException($e, 'Failed to submit profile');
        }
    }
}
