<?php

namespace App\Http\Controllers\Admin\client;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function create(){
        return view('admin.client.create');
    }
}
