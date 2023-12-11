<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\FilterRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
   public function __invoke(FilterRequest $request)
   {
       $date = $request->validated();
       $groups = $this->service->index($date);
       if (auth()->user()->role === 'user' or auth()->user()->role === 'curator') {
           $groups = $this->service->filter($groups);
       }
       return view('group.index', compact('groups'));
   }
}
