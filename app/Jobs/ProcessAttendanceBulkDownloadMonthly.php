<?php

namespace App\Jobs;

use App\Models\Settings;
use App\Services\Exports\AttendanceBulkDownload;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAttendanceBulkDownloadMonthly implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $settings = Settings::where('key', SETTINGS::FEATURES['automate_download_monthly'])->first();
        if (!$settings->properties) {
            return;
        }

        try {
            (new AttendanceBulkDownload(now()->subMonth()))->call();
        } catch (\Exception $e) {
            // Throw to Rollbar
        }
    }
}
