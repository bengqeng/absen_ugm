<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    // Dont Change No metter metter
    public const STATUS = [
        'office' => 'office',
        'remote' => 'out office',
    ];

    protected array $enumStatus = self::STATUS;

    protected $fillable = [
        'check_out_ip', 'check_in_ip', 'user_id', 'check_in', 'check_out', 'status_in', 'status_out', 'note_in', 'note_out', 'overtime'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['hours_checkin', 'hours_checkout', 'total_work_time', 'date_attendance'];

    /**
     * Get owner of attendance.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function listStatus()
    {
        $list = [];
        foreach (self::STATUS as $key => $value) {
            array_push($list, $value);
        }

        return $list;
    }

    public function getHoursCheckinAttribute()
    {
        return Carbon::parse($this->check_in)->format('H:i');
    }

    public function getHoursCheckoutAttribute()
    {
        if ($this->check_out != null) {
            return Carbon::parse($this->check_out)->format('H:i');
        } else {
            return '-';
        }
    }

    public function getTotalWorkTimeAttribute()
    {
        if ($this->check_in === null || $this->check_out === null) {
            return '-';
        }

        $start = new DateTime($this->check_in);
        $end = new DateTime($this->check_out);
        $diff = $start->diff($end);

        return $diff->format('%h Jam %i Menit');
    }

    public function getDateAttendanceAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function getOvertimeAttribute($data)
    {
        if ($data < 1) {
            return '-';
        }
        $format = '%02d jam, %02d menit';
        $hours = floor($data / 60);
        $minutes = ($data % 60);
        $result = sprintf($format, $hours, $minutes);
        return $result;
    }
}
