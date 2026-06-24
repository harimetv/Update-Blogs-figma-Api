<?php

use App\Services\ErrorLogService;

if (!function_exists('log_exception')) {
    function log_exception(Throwable $e, string $context = 'Unhandled'): string
    {
        $logger = app(ErrorLogService::class);
        return $logger->log($context, $e);
    }
}