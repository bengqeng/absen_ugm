<?php

namespace App\Services;

use App\Exports\AttendanceExport;
use App\Models\Attendance;
use App\Models\User;
use App\Services\AbstractServices as AbstractService;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceService extends AbstractService
{
    public function getListAttendance($month, $year, $selectedDate, $user_id)
    {
        $attendances = [];
        $days = $this->getListDateMonth($selectedDate);

        $attendances = Attendance::when($month, function ($query, $month) {
            $query->whereMonth('created_at', $month);
        })
            ->when($year, function ($query, $year) {
                $query->whereYear('created_at', $year);
            })
            ->where('user_id', $user_id)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('d');
            })
            ->toArray();

        $attendances = $this->formatAttendance($days, $attendances);

        return $attendances;
    }

    public function getDetailAttendance($id)
    {
        $attendances = Attendance::with('user')->find($id);

        return $attendances;
    }

    public function formatAttendance($days, $attendances)
    {
        $data = [];
        foreach ($days as $key => $value) {
            $record = null;
            if (array_key_exists($value->format('d'), $attendances)) {
                $record = $attendances[$value->format('d')][0];
            }
            array_push($data, ['date' => $value, 'attendance' => $record, 'isWeekend' => $value->isWeekend()]);
        }

        return $data;
    }

    public function exportAttendance($attendances)
    {
        $arrayExport = [];
        foreach ($attendances as  $item) {
            $arrayExport[] = [
                $item['date']->format('d/m/Y'),
                (isset($item['attendance']['hours_checkin'])) ? $item['attendance']['hours_checkin'] : '-',
                (isset($item['attendance']['hours_checkout'])) ? $item['attendance']['hours_checkin'] : '-',
                (isset($item['attendance']['status_in'])) ? $item['attendance']['status_in'] : '-',
                (isset($item['attendance']['status_out'])) ? $item['attendance']['status_out'] : '-',
                (isset($item['attendance']['note_in'])) ? $item['attendance']['note_in'] : '-',
                (isset($item['attendance']['note_out'])) ? $item['attendance']['note_out'] : '-',
            ];
        }
        $export = new AttendanceExport([
            $arrayExport
        ]);
        return $export;
    }
}
