<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
   public function __invoke(Course $course)
   {
       //Восстановление строчки в бд из мусорки
//        $creatorc_courses = Creator_course::withTrashed()->find(2);
//        $creatorc_courses->restore();
       $course->groups()->delete();
       $course->lessons()->delete();
       $course->delete();
       return redirect()->route('Course.index');

   }
}
