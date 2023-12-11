<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
   public function __invoke(Lesson $lesson)
   {
       return view('lesson.show', compact('lesson'));
   }
}
