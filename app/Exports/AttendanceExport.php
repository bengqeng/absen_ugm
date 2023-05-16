<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;

class AttendanceExport implements FromArray, WithHeadings, WithEvents
{
    protected $invoices;

    protected static $month;

    protected static $year;

    protected static $user;

    use RegistersEventListeners;

    public function __construct(array $invoices, string $month, string $year, int $user)
    {
        $this->invoices = $invoices;
        self::$month = $month;
        self::$year = $year;
        self::$user = $user;
    }

    public function array(): array
    {
        return $this->invoices;
    }

    public function headings(): array
    {
        return [
            'No',
            'Hari',
            'Tanggal',
            'Jam Masuk',
            'Catatan Masuk',
            'Jam Keluar',
            'Catatan Keluar',
            'Status Masuk',
            'Status Keluar',
            'Total Jam Kerja',
            'Waktu Lembur',
        ];
    }

    public static function beforeSheet(BeforeSheet $event)
    {
        $user_detail = User::find(self::$user);
        $event->sheet->appendRows([
            ['PRESENSI KEHADIRAN STAF NON DOSEN BULAN '.self::$month.' '.self::$year],
            ['PUSAT KEDOKTERAN, TROPIS FAKULTAS KEDOKTERAN, KESEHATAN MASYARAKAT DAN KEPERAWATAN UGM'],
            [''],
            ['Nama', ':', $user_detail->name],
            ['Project', ':', ''],
            [''],
        ], $event);
    }

    public static function afterSheet(AfterSheet $event)
    {
        $event->sheet->appendRows([
            [''],
            ['Yogyakarta'],
            ['Mengetahui,'],
            [''],
            [''],
            [''],
            ['dr. Riris Andono Ahmad, MPH, PhD'],
        ], $event);
        // $event->getSheet()->getDelegate()->getStyle('A1:K1')->getFont()->setName('Calibri')->setSize(13);
        // $event->getSheet()->getDelegate()->getStyle('A2:K2')->getFont()->setName('Calibri')->setSize(13);
        // $event->getSheet()->getDelegate()->getStyle('A4:K4')->getFont()->setName('Calibri')->setSize(13);
        // $event->getSheet()->getDelegate()->getStyle('A5:K5')->getFont()->setName('Calibri')->setSize(13);
    }
}
