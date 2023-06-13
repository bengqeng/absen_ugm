<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::where('name', 'Bitind Technology')->firstOr(function () {
            Report::Create([
                'name' => 'Bitind Technology',
                'email' => 'bitind@mail.com',
            ]);
        });
    }
}
