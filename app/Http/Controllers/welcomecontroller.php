<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use Illuminate\Http\Request;

class welcomecontroller extends Controller
{
    public function index()
    {
        $user = Role::find(UserRoleEnum::USER);
        $user=$user->users;
        return view('main',compact('user'));
    }
}
