<?php

namespace App\Services\User;

use App\Models\Attendance;
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
        } else {
            $data = array_merge($attribute, [
                'check_out' => $checkOut,
                'status_out' => $this->getStatus(),
            ]);

            if ($this->record->update($data)) {
                $this->status = true;
            } else {
                $this->message = 'Gagal Menyimpan Record';
            }
        }

        return $this->response();
    }

    private function getStatus()
    {
        if (App::environment('local', 'staging')) {
            return 'WFH';
        } else {
            // WE NEED TO COMPARE WFH / WFH HERE
        }
    }

    private function getAttendaceCurrentDate($date, $type = 'check_in')
    {
        return Attendance::where('user_id', $this->user->id)
            ->whereDate('created_at', $date)
            ->when($type == 'check_in', function ($query) {
                $query->Where('check_in', '')->orWhereNotNull('check_in');
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
