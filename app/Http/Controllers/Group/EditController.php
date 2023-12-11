<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends BaseController
{
   public function __invoke(Group $group)
   {
       $courses = Course::all();
       $users = User::where('role',  'user')->orWhere('role', 'curator')->get();
       return view('group.edit', compact('group', 'courses', 'users'));
   }
}
