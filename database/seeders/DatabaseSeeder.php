<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        User::factory(1)->create();
    }
}
