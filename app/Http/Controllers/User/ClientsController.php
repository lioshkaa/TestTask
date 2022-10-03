<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class ClientsController extends Controller
{

    public function index(){

        $user = User::find(auth()->user()->id);
        $recored = $user->Users;

        return view('user.clients.index',compact('recored'));
    }
}
