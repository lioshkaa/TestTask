<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request,$recored){

        $recored = Recored::where('id',$recored)->update(['reception'=>$request->reception]);
        $user = User::find(auth()->user()->id);
        $recored = $user->Users;
        return view('user.clients.index',compact('recored'));



    }
}
