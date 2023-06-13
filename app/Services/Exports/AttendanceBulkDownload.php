<?php

namespace App\Services\Exports;

use App\Exports\BulkDownloadAttendanceExport;
use App\Mail\SendBulkDownloadAttendanceMail;
use App\Models\Report;
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
        $listEmail = self::getListEmailedUser();
        if ($listEmail[0] === false) {
            return true;
        }

        foreach ($userIds as $key => $bulkUserId) {
            try {
                $fileName = now()->format('YmdHs').'_'.self::$fileName;
                (new BulkDownloadAttendanceExport($bulkUserId, $this->date))->store("${fileName}");
                self::sendToUser($fileName, $listEmail[1]['primary'], $listEmail[1]['cc']);
            } catch (\Exception $e) {
                if( !(env('APP_ENV') == 'production')){
                    echo $e;
                }
            }
        }

        return true;
    }

    private function getListEmailedUser()
    {
        $list = [];
        $valid = false;
        $emails = Report::all();

        foreach ($emails as $email){
            if($email->status == 'primary'){
                $list['primary'] = $email->email;
                $valid = true;
            } else {
                $list['cc'][] =  $email->email;
            }
        }

        return [$valid, $list];
    }

    private function sendToUser(string $path, string $primary, array $cc){
        try {
            Mail::to($primary)
                ->cc($cc)
                ->send(new SendBulkDownloadAttendanceMail("${path}"));
        } catch (\Exception $e) {
            if( !(env('APP_ENV') == 'production')){
                echo $e;
            }
        }

        self::deleteFile($path);
    }

    private function deleteFile($path)
    {
        if (Storage::exists("${path}")) {
            Storage::delete("${path}");
        }

        return true;
    }
}
