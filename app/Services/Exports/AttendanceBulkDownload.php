<?php

namespace App\Services\Exports;

use App\Exports\BulkDownloadAttendanceExport;
use App\Mail\SendBulkDownloadAttendanceMail;
use App\Models\User;
use App\Services\AbstractServices;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AttendanceBulkDownload extends AbstractServices
{
    private static string $fileName = 'bulk_attendance_download.xlsx';

    public function __construct(private $date)
    {
        //
    }

    public function call()
    {
        $userIds = User::orderBy('name', 'asc')
            ->listByRole(['staff'])
            ->pluck('id')
            ->chunk(20); // << To do update dynamically

        if (count($userIds) <= 0) {
            return false;
        }

        foreach ($userIds as $key => $chunk) {
            $userIds[$key] = array_values($chunk->toArray());
        }

        self::executeBatchDownload($userIds);

        return true;
    }

    private function executeBatchDownload($userIds)
    {
        foreach ($userIds as $key => $bulkUserId) {
            try {
                $fileName = now()->format('YmdHs').'_'.self::$fileName;
                (new BulkDownloadAttendanceExport($bulkUserId, $this->date))->store("${fileName}");

                Mail::to('asd@mail.com')
                    ->cc(['ccc@mail.com', 'lala@mail.com'])
                    ->send(new SendBulkDownloadAttendanceMail("${fileName}"));

            } catch (\Exception $e) {
                // TODO ROLLBAR HERE
                echo $e;
            }

            self::deleteFile($fileName); // Make Sure File Deleted if somethind happen
        }

        return true;
    }

    private function deleteFile($path)
    {
        if (Storage::exists("${path}")) {
            Storage::delete("${path}");
        } else {
            // Rollbar here
        }

        return true;
    }
}
