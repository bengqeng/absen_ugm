<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    public const FEATURES = [
        'ip' => 'ip',
    ];

    protected array $enumFeatures = self::FEATURES;

    protected $fillable = ['key', 'options', 'properties', 'name'];

    public function scopeGroupByFeature($query, $feature = '')
    {
        $featureKey = rescue(function () use ($feature) {
            return $this::FEATURES[$feature];
        }, function ($exception) {
            return '';
        }, false);

        if ($featureKey == '') {
            return [];
        }

        return $query->where('key', $featureKey);
    }
}
