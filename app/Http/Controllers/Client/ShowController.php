<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\User;
use App\Models\workday;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(User $user,$date){

       $recored = $user->Users->where('date_day',$date);

       return view('client.user.show',compact('user','recored'));


    }
}
