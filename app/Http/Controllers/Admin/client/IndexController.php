<?php

namespace App\Http\Controllers\Admin\client;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use App\Models\workday;

class IndexController extends Controller
{
    public function index(){

        $workday = workday::all();
        $recored = Recored::all();

        return view('admin.client.index',compact('workday','recored'));


    }
}
