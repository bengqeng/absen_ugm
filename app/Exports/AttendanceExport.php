<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AttendanceExport implements FromArray, WithHeadings
{
    protected $invoices;

    public function __construct(array $invoices)
    {
        $this->invoices = $invoices;
    }

    public function array(): array
    {
        return $this->invoices;
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jam Check In',
            'Jam Check Out',
            'Status Check In',
            'Status Check Out',
            'Catatan Check In',
            'Catatan Check Out',
            'Total Jam Kerja',
        ];
    }
}
