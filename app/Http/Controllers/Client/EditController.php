<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\User;
use App\Models\workday;

class EditController extends Controller
{
    public function edit(Recored $user){

        return view('client.user.edit',compact('user'));

    }
}
