<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::Create([
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('12345678'),
            'status_type' => User::STATUSTYPE['active'],
            'project_id' => null,
            'gender' => 'M',
        ]);

        $superAdmin->assignRole('super_admin');
    }
}
