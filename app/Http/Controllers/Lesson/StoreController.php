<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\StoreRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $this->service->store($data);
       return redirect()->route('Lesson.index');
   }
}
