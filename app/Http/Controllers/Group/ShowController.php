<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(Group $group)
    {
        $flag = $this->service->filterOne($group);
        if ($flag) {
            return view('group.show', compact('group'));
        }
        else{
            return redirect()->route('Group.index');
        }
    }
}
