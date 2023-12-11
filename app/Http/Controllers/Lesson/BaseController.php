<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Services\Lesson\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->middleware('auth');
        $this->service = $service;

    }
}
