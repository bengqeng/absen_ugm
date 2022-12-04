<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::where('name', 'admin')->get()->count() < 1) {
            Role::create(
                ['name' => 'admin']
            );
        }

        if (Role::where('name', 'super_admin')->get()->count() < 1) {
            Role::create(
                ['name' => 'super_admin']
            );
        }

        if (Role::where('name', 'staff')->get()->count() < 1) {
            Role::create(
                ['name' => 'staff']
            );
        }
    }
}
