<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Models\Course;
use App\Models\Group;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $this->service->store($data);
       return redirect()->route('Group.index');
   }
}
