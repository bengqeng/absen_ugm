<?php

namespace Database\Seeders;

use App\Models\Settings;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('email', 'admin@mail.com')->firstOr(function () {
            $Admin = User::Create([
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('12345678'),
                'status_type' => User::STATUSTYPE['active'],
                'project_id' => null,
                'gender' => 'M',
            ]);

            $Admin->assignRole('admin');
        });
    }
}
