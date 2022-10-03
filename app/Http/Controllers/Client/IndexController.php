<?php

namespace App\Http\Controllers\Client;

use App\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\workday;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $user = Role::find(UserRoleEnum::USER);
        $user = $user->users;

        $recored = $request->users;
        $time = $request->time;

        if(isset($request->start)) {
            $workday = workday::where('date_day', $request->start)->get();
            return view('client.index',compact('user','recored','time','workday'));
        }
        return view('client.index',compact('user','recored','time'));



    }
}
