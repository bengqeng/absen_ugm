<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class IpSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::where('key', Settings::FEATURES['ip'])->firstOr( function () {
            Settings::Create([
                'key' => Settings::FEATURES['ip'],
                'name' => 'example',
                'properties' => '127.0.0.1',
            ]);
        });
    }
}
