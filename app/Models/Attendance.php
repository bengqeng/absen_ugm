<?php

namespace App\Models;

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
}
