<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Course\UpdateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Course $course)
    {
        $data = $request->validated();
        $this->service->update($course, $data);
        return redirect()->route('Course.show', $course->id);

    }
}
