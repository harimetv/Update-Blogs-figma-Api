<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function video()
    {
        $data['video'] = asset('home-video.mp4');
        return $this->successResponse('Video fetched successfully', $data);
    }
}
