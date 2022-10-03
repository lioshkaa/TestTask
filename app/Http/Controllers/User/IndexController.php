<?php

namespace App\Http\Controllers\User;

use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\Role;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {

        $user = User::find(auth()->user()->id);
        $workDays = $user->workdays;
        $recoreds = $user->Users;
        return view('user.index',compact('user','workDays','recoreds'));

    }


}
