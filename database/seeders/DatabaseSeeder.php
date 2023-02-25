<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

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
        if (App::environment('local', 'staging')) {
            $this->call(IpSettingSeeder::class);
            $this->call(UserLevelSeeder::class);
            $this->call(UserAdminSeeder::class);
            $this->call(ProjectSeeder::class);
            $this->call(AssetCategorySeeder::class);
        }
    }
}
