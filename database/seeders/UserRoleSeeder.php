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
        foreach(array_keys(Role::ROLETYPE) as $roleKey){
            $role = Role::ROLETYPE[$roleKey];
            if (Role::where('name', $role)->get()->count() < 1) {
                Role::create(
                    ['name' => $role]
                );
            }
        }
    }
}
