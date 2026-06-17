<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait ApiResponse
{
    /**
     * Success Response
     */
    protected function successResponse($message, $data = [], int $code = 200): JsonResponse
    {
        return response()->json([
            'status'  => true,
            'message' => $message,
            'data'    => $data,
        ], $code);
    }

    /**
     * Error Response
     */
    protected function errorResponse($message, $codeKey = 'ERROR', $code = 422, $errors = []): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => $message,
            'code'    => $codeKey,
            'errors'  => $errors,
        ], $code);
    }

    //  Common Exception Handler
    protected function handleException($e, $message)
    {
        // $errorId = log_exception($e, $message);
        // // Log::error("$message: {$e->getMessage()}", ['error_id' => $errorId]);
        // // return response()->json([
        // //     'status' => false,
        // //     'message' => "{$message}. Please contact support with Error ID: {$errorId}.",
        // //     'error_id' => $errorId
        // // ], 500);
        Log::error($message, [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ]);
        return $this->errorResponse(
            "Something went wrong.",
            'EXCEPTION',
            500,
            new \stdClass()
        );
    }
}
