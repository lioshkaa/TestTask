<?php

namespace App\services\User;

use App\Models\Recored;
use App\Models\User;
use App\Models\workday;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class Service
{

    public function store($dataUser,$dataWorkday)
    {

        if(isset($dataUser)) {

            $user = User::create([
                'name' => $dataUser['name'],
                'email' => $dataUser['email'],
                'password' => Hash::make($dataUser['password']),
                'title' => $dataUser['title'],
                'role_id' => $dataUser['role_id']

            ]);
        }


        elseif(isset($dataWorkday)) {

            if (isset($dataWorkday['start_recored']) && isset($dataWorkday['stop_recored'])) {
                $start_recored = $dataWorkday['start_recored'];
                $stop_recored = $dataWorkday['stop_recored'];
                unset($dataWorkday['start_recored']);
                unset($dataWorkday['stop_recored']);


                $workday = workday::firstOrcreate([
                    'user_id' => $dataWorkday['user_id'],
                    'date_day' => $dataWorkday['date_work'],
                    'start' => $dataWorkday['start_at'],
                    'end' => $dataWorkday['stop_at'],
                ]);

                foreach ($start_recored as $key_start => $start) {
                    foreach ($stop_recored as $key_stop => $stop)
                        if ($key_start == $key_stop) {
                            $recored = Recored::firstOrcreate([
                                'user_id' => $dataWorkday['user_id'],
                                'start_record' => $start,
                                'stop_record' => $stop,
                                'date_day' => $dataWorkday['date_work'],
                            ]);
                        }
                }

                Recored::firstOrcreate([

                    'user_id' => $dataWorkday['user_id'],
                    'start_record' => $dataWorkday['start_break'],
                    'stop_record' => $dataWorkday['stop_break'],
                    'date_day' => $dataWorkday['date_work'],
                    'client_id' => $dataWorkday['client_id'],
                    ]);

            }
        }
    }
    public function update($user, $data)
    {
        $user->update($data);
    }

    public function delete($user){

        $recored = Recored::where('user_id',$user->id)->delete();
        $workdays = workday::where('user_id',$user->id)->delete();
        $user->delete();

    }

}
