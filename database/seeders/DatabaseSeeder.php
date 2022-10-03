<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        foreach (UserRoleEnum::cases() as $case) {
            Role::factory()->create([
                'title' => $case->status()
            ]);
        }

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'lioshakhirny@gmail.com',
            'role_id'=>UserRoleEnum::ADMIN->value,
            'email_verified_at' => now(),
            'title'=>'',
            'password' => bcrypt('admin'),// password
            'remember_token' => Str::random(10),
        ]);
    }
}
