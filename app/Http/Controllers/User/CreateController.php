<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
   public function __invoke()
   {
       $groups = Group::all();
       return view('user.create', compact('groups'));
   }
}
