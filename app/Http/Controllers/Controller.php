<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;

abstract class Controller
{
    use ApiResponse;
    protected $user;
    protected $userId;
    public function __construct($user = null)
    {
        $this->user = request()->attributes->get('user');
    }
}
