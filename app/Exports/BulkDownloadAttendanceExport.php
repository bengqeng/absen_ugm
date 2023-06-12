<?php

namespace App\Exports;

use App\Exports\Sheets\BulkDownloadAttendancePerSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class BulkDownloadAttendanceExport implements WithMultipleSheets
{
    use Exportable;

    public function __construct(private array $userIds, private $date)
    {
        //
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->userIds as $userId) {
            $sheets[] = new BulkDownloadAttendancePerSheets($userId, $this->date);
        }

        return $sheets;
    }
}
