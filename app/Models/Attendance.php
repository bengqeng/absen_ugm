<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';

    public const STATUS = [
        'office' => 'office',
        'remote' => 'remote',
    ];

    protected array $enumStatus = self::STATUS;

    /**
     * Get owner of attendance.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
