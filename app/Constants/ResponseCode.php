<?php

namespace App\Constants;

use Symfony\Component\HttpFoundation\Response;

class ResponseCode
{
    /**
     * ✅ Success
     */
    public const OK = Response::HTTP_OK;                 // 200 - Success (GET)
    public const CREATED = Response::HTTP_CREATED;       // 201 - Created (POST)
    public const NO_CONTENT = Response::HTTP_NO_CONTENT; // 204 - Success, no data

    /**
     * ⚠️ Client Errors
     */
    public const BAD_REQUEST = Response::HTTP_BAD_REQUEST;         // 400 - Invalid request
    public const UNAUTHORIZED = Response::HTTP_UNAUTHORIZED;       // 401 - Not logged in
    public const FORBIDDEN = Response::HTTP_FORBIDDEN;             // 403 - No permission
    public const NOT_FOUND = Response::HTTP_NOT_FOUND;             // 404 - Resource not found
    public const METHOD_NOT_ALLOWED = Response::HTTP_METHOD_NOT_ALLOWED; // 405 - Wrong HTTP verb
    public const UNPROCESSABLE_ENTITY = Response::HTTP_UNPROCESSABLE_ENTITY; // 422 - Validation failed

    /**
     * 🚨 Server Errors
     */
    public const INTERNAL_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR; // 500 - Server crash
    public const SERVICE_UNAVAILABLE = Response::HTTP_SERVICE_UNAVAILABLE; // 503 - Maintenance mode
}
