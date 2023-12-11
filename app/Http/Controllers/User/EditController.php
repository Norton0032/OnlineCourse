<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends BaseController
{
   public function __invoke(User $user)
   {
       $groups = Group::all();
       return view('user.edit', compact('user', 'groups'));
   }
}
