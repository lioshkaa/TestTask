<?php

namespace App\Http\Controllers\Admin\User;

use App\Enum\DayEnum;
use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\workday;
use Carbon\Carbon;
use Validator;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke(Request $request){

            $user = Role::find(UserRoleEnum::USER);
            $user = $user->users;
            $data = workday::all();

            return view('admin.user.create',compact('data','user'));

    }

}
