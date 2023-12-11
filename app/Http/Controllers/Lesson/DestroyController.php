<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
   public function __invoke(Lesson $lesson)
   {
       //Восстановление строчки в бд из мусорки
//        $creatorc_courses = Creator_course::withTrashed()->find(2);
//        $creatorc_courses->restore();
       $lesson->delete();
       return redirect()->route('Lesson.index');

   }
}
