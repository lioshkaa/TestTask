<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Models\workday;
use Carbon\Carbon;
use Faker\Provider\Base;
use GuzzleHttp\Psr7\Request;
use Validator;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){

        $data = $request->validated();

        $this->service->store($data,null);

        return redirect()->route('admin.user.create');
    }
}
