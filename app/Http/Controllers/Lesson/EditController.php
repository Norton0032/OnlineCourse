<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class EditController extends BaseController
{
   public function __invoke(Lesson $lesson)
   {
       $courses = Course::all();
       return view('lesson.edit', compact('lesson', 'courses'));
   }
}
