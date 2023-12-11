<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\FilterRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
//       $this->authorize('view', auth()->user());
        // Запрет на чиение данных
        $date = $request->validated();
        $users = $this->service->index($date);
        if (auth()->user()->role === 'user' or auth()->user()->role === 'curator') {
            $users = $this->service->filter($users);
        }

        return view('user.index', compact('users'));
    }
}
