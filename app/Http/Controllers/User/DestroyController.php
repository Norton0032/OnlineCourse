<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
   public function __invoke(User $user)
   {
       //Восстановление строчки в бд из мусорки
//        $creatorc_courses = Creator_course::withTrashed()->find(2);
//        $creatorc_courses->restore();
       $user->delete();
       return redirect()->route('User.index');

   }
}
