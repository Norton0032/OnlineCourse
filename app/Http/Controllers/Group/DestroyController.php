<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
   public function __invoke(Group $group)
   {
       $group->delete();
       return redirect()->route('Group.index');

   }
}
