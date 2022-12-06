<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = User::Create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'status_type' => User::STATUSTYPE['active']
        ]);

        $Admin->assignRole('admin');
    }
}
