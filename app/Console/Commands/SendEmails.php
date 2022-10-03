<?php

namespace App\Console\Commands;

use App\Enum\ReceptionEnum;
use App\Enum\UserRoleEnum;
use App\Mail\DemoEmail;
use App\Models\Recored;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Postmark\PostmarkClient;
use Symfony\Component\Mime\DraftEmail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data = array('name'=>"Админ");

        $recoreds = Recored::all();


        Mail::send('mail',["data"=>$recoreds], function($message) {
            $admin = Role::find(UserRoleEnum::ADMIN);
            foreach ($admin->users as $UserAdmin) {
                $message->to($UserAdmin->email, 'Tutorials Point')->subject
                ('Записи на прием');
                $message->from($UserAdmin->email,$UserAdmin->name);
            }
        });
    }
}
