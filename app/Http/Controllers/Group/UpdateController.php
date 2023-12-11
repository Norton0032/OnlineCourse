<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $this->service->update($group, $data);
        return redirect()->route('Group.show', $group->id);

    }
}
