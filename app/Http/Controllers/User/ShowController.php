<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
        if (auth()->user()->role === 'user' or auth()->user()->role === 'curator') {
            $groups = $user->groups;
            $myGroup = auth()->user()->groups;
            if ($groups->intersect($myGroup)->isEmpty() ? true : false) {
                return redirect()->route('User.index');
            }
        }
        return view('user.show', compact('user'));
    }
}
