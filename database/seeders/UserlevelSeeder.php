<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('12345678'),
            'status_type' => User::STATUSTYPE['active'],
        ]);

        $user->assignRole('staff');
    }
}
