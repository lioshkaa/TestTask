<?php

namespace App\Http\Controllers\Admin\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Models\Recored;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\UiServiceProvider;

class StoreController extends Controller
{
    public function store(ClientRequest $request)
    {

        $data = $request->validated();
            User::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'password'=>Hash::make($data['password']),
                'role_id'=>$data['role_id']
            ]);

        $recored = Recored::all();


        return view('admin.client.index',compact('recored'));
    }
}
