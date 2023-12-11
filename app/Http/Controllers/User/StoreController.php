<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
   public function __invoke(StoreRequest $request)
   {
       $data = $request->validated();
       $this->service->store($data);
       return redirect()->route('User.index');
   }
}
