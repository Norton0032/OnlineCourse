<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Services\Group\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->middleware('auth');
        $this->service = $service;

    }
}
