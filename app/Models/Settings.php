<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';

    public const FEATURES = [
        'ip'  => 'ip'
    ];

    protected array $enumFeatures = self::FEATURES;
}
