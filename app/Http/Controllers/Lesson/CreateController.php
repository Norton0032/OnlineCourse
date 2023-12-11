<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
   public function __invoke()

   {
       $courses = Course::all();
       return view('lesson.create', compact('courses'));
   }
}
