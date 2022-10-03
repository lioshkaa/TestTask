<?php

namespace App\Http\Controllers\Admin\User;

use App\Enum\DayEnum;
use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\workday;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class IndexController extends BaseController
{
    public function __invoke(Request $request){

        $user = Role::find(UserRoleEnum::USER);
        $user = $user->users;
        $workday = workday::all();

        return view('admin.user.index',compact('user','workday'));
    }
}
