<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (array_keys(Role::ROLETYPE) as $roleKey) {
            $role = Role::ROLETYPE[$roleKey];
            if (Role::where('name', $role)->get()->count() < 1) {
                Role::create(
                    ['name' => $role]
                );
            }
        }
    }
}
