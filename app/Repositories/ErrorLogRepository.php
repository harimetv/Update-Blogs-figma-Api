<?php

namespace App\Repositories;

use App\Models\ErrorLog;

class ErrorLogRepository
{
    public function create(array $data): ErrorLog
    {
        return ErrorLog::create($data);
    }
}
