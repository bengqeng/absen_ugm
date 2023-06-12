<?php

namespace App\Jobs;

use App\Services\Exports\AttendanceBulkDownload;
use App\Traits\DateTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessAttendanceCustomBulkDownload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, DateTrait;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private $year, private $month)
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
        try {
            $dateByYearMonth = $this->createDateByYearMonth("{$this->year}-{$this->month}");
            (new AttendanceBulkDownload($dateByYearMonth))->call();
        } catch (\Exception $e) {
            // TODO throw Rollbar
        }
    }
}
