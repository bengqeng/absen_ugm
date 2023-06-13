<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsAutomateBulkDownloadMonthlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::where('key', Settings::FEATURES['automate_download_monthly'])->firstOr(function () {
            Settings::Create([
                'key' => Settings::FEATURES['automate_download_monthly'],
                'name' => 'Automate Download Monthly Settings',
                'properties' => false,
            ]);
        });
    }
}
