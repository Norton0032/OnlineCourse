<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class EditController extends BaseController
{
   public function __invoke(Course $course)
   {
       return view('course.edit', compact('course'));
   }
}
