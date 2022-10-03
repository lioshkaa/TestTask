<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\User;

class EditController extends Controller
{
    public function edit($recored){
        $recored=Recored::find($recored);
        return view('user.clients.edit',compact('recored'));

    }
}
