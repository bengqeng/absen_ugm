<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;

class UserlevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('123456')
        ]);

        UserRole::Create([
            'user_id' => $user->id,
            'role' => 'user'
        ]);
    }
}
