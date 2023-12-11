<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
   public function __invoke()
   {
       return view('course.create');
   }
}
