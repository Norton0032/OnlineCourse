<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\FilterRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
//       $this->authorize('view', auth()->user());
       // Запрет на чиение данных
       $date = $request->validated();
       $courses = $this->service->index($date);
       return view('course.index', compact('courses'));
   }
}
