<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetSubmission extends Model
{
    use HasFactory;

    protected $table = 'asset_submission';

    public const STATUS = ['pending', 'approved', 'borrowed', 'done'];

    protected array $enumSTATUS = self::STATUS;

    /**
     * Get owner of asset_submission.
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get owner of asset_submission.
     */
    public function user_approval()
    {
        return $this->belongsTo(User::class, 'approval_id');
    }

    /**
     * Get asset of asset_submission.
     */
    public function asset()
    {
        return $this->belongsTo(Assets::class, 'asset_id');
    }
}
