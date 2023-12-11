<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
   public function __invoke()
   {
       $courses = Course::all();
       $users = User::where('role',  'user')->orWhere('role', 'curator')->get();
       return view('group.create', compact('courses', 'users'));
   }
}
