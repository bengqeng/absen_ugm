<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);

        // Note
        // Please add inside here if seeder is only for development purpose
        if (env('APP_ENV', 'local') == 'local') {
            $this->call(IpSettingSeeder::class);
            $this->call(UserLevelSeeder::class);
            $this->call(UserAdminSeeder::class);
        }
    }
}
