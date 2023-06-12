<?php

namespace App\Exports\Sheets;

use App\Models\User;
use App\Services\AttendanceService;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;

class BulkDownloadAttendancePerSheets implements FromArray, WithTitle
{
    private ?User $user;

    public function __construct(private $userId, private $date)
    {
        $this->user = User::with('project')->where('id', $userId)->first();
    }

    public function array(): array
    {
        $attendances = (new AttendanceService())->getListAttendance($this->date->month, $this->date->year, $this->date, $this->userId);

        $arrayExport = [
            ['PRESENSI KEHADIRAN STAF NON DOSEN BULAN '.$this->date->month.' '.$this->date->year],
            ['PUSAT KEDOKTERAN, TROPIS FAKULTAS KEDOKTERAN, KESEHATAN MASYARAKAT DAN KEPERAWATAN UGM'],
            [''],
            ['Nama', ':', $this->user->name],
            ['Project', ':', $this->user->project->name ?? ''],
            [''],
        ];

       $arrayExport[] = [ 'No', 'Hari', 'Tanggal', 'Jam Masuk', 'Catatan Masuk', 'Jam Keluar', 'Catatan Keluar', 'Status Masuk', 'Status Keluar', 'Total Jam Kerja', 'Waktu Lembur' ];

        $number = 0;
        foreach ($attendances as  $item) {
            $number++;
            $arrayExport[] = [
                $number,
                $item['date']->format('l'),
                $item['date']->format('d F Y'),
                (isset($item['attendance']['hours_checkin'])) ? $item['attendance']['hours_checkin'] : '-',
                (isset($item['attendance']['note_in'])) ? $item['attendance']['note_in'] : '-',
                (isset($item['attendance']['hours_checkout'])) ? $item['attendance']['hours_checkin'] : '-',
                (isset($item['attendance']['note_out'])) ? $item['attendance']['note_out'] : '-',
                (isset($item['attendance']['status_in'])) ? $item['attendance']['status_in'] : '-',
                (isset($item['attendance']['status_out'])) ? $item['attendance']['status_out'] : '-',
                $item['attendance']['total_work_time'] ?? '-',
                (isset($item['attendance']['overtime'])) ? $item['attendance']['overtime'] : '-',
            ];
        }

        $arrayExport[] = [ [''], ['Jumlah Hari', 'Libur', 'Cuti'], [$number] ];
        $arrayExport[] = [
            [''],
            ['Yogyakarta'],
            ['Mengetahui,'],
            [''],
            [''],
            [''],
            ['dr. Riris Andono Ahmad, MPH, PhD'],
        ];

        return $arrayExport;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->user->email;
    }
}
