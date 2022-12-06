<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSubmission extends Model
{
    use HasFactory;

    protected $table = 'log_submission';

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
