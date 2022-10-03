<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\Recored;
use App\Models\workday;

class StoreWorkdayController extends BaseController
{
    public function __invoke(UsersRequest $request){

        $data = $request->validated();

        $this->service->store(null,$data);

        return redirect()->route('admin.user.create');

    }

}
