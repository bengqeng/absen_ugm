<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    // Dont Change No metter metter
    public const STATUS = [
        'office' => 'WFO',
        'remote' => 'WFH',
    ];

    protected array $enumStatus = self::STATUS;

    protected $fillable = [
        'user_id', 'check_in', 'check_out', 'status_in', 'status_out', 'note_in', 'note_out',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['hours_checkin', 'hours_checkout'];

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
        return Carbon::parse($this->check_out)->format('H:i');
    }
}
