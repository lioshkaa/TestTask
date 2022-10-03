<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Recored;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Recored $user){
        $recored = Recored::all();

        foreach ($recored as $recoreds){
            if($user->user_id == $recoreds->user_id){
                if($recoreds->date_day == $user->date_day) {
                    if ($recoreds->client_id == auth()->user()->id) {
                        $users = $recoreds->date_day;
                        $time = $recoreds->start_record;
                        return redirect()->route('client',compact('users','time'));
                    }
                }
            }
        }
        $affectedRecords = Recored::where("id", $user->id)->update(["client_id" => auth()->user()->id]);

        return redirect()->route('client');
    }
}
