<?php

namespace App\Http\Controllers\Lesson;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lesson\UpdateRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Lesson $lesson)
    {
        $data = $request->validated();
        $this->service->update($lesson, $data);
        return redirect()->route('Lesson.show', $lesson->id);

    }
}
