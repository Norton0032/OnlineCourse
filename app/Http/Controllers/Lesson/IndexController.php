<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\FilterRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
//       $this->authorize('view', auth()->user());
       // Запрет на чиение данных
       $date = $request->validated();
       $lessons = $this->service->index($date);
       $lesson = $lessons[0];
//       dd(\App\Models\Course::find(3));
       return view('lesson.index', compact('lessons'));
   }
}
