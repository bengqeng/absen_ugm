<?php

namespace App\Services\User;

use App\Models\Attendance;
use App\Models\Settings;
use App\Services\IpService;
use Illuminate\Support\Facades\App;

class AbsentService
{
    protected $user;

    protected $status = false;

    protected $message = '';

    protected $record = null;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function checkIn($checkIn, $attribute)
    {
        if ($this->getAttendaceCurrentDate($checkIn) != null) {
            $this->message = 'Gagal! Anda sudah melakukan check-in';
        } else {
            $data = array_merge($attribute, [
                'check_in_ip' => (new IpService())->getUserIp(),
                'user_id' => $this->user->id,
                'check_in' => $checkIn,
                'status_in' => $this->getStatus(),
            ]);
            $this->record = Attendance::create($data);
            if ($this->record) {
                $this->status = true;
            } else {
                $this->message = 'Gagal! Menyimpan Record';
            }
        }

        return $this->response();
    }

    public function checkOut($checkOut, $attribute)
    {
        $this->record = $this->getAttendaceCurrentDate($checkOut, 'check_in');
        if ($this->record == null) {
            $this->message = 'Gagal! Anda Belum melakukan check-in';

            return $this->response();
        }

        if (in_array($this->record->check_out, [null, ''])) {
            $data = array_merge($attribute, [
                'check_out_ip' => $checkOut,
                'status_out' => $this->getStatus(),
                'check_out_ip' => (new IpService())->getUserIp(),
            ]);

            if ($this->record->update($data)) {
                $this->status = true;
            } else {
                $this->message = 'Gagal Menyimpan Record';
            }
        } else {
            $this->message = 'Gagal! Anda Sudah melakukan check-out';
        }

        return $this->response();
    }

    private function getStatus()
    {
        return (new IpService())->getUserStatusIp();
    }

    private function getAttendaceCurrentDate($date, $type = 'check_in')
    {
        return Attendance::where('user_id', $this->user->id)
            ->whereDate('created_at', $date)
            ->when($type == 'check_in', function ($query) {
                $query->Where('check_in', '<>', '')->WhereNotNull('check_in');
            })
            ->when($type == 'check_out', function ($query) {
                $query->Where('check_out', '')->orWhereNotNull('check_out');
            })
            ->first();
    }

    private function response()
    {
        return [$this->status, $this->message, $this->record];
    }
}
