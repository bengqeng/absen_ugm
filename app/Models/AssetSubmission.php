<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class AssetSubmission extends Model
{
    use HasFactory;

    protected $table = 'asset_submission';

    public const STATUS = ['pending', 'approved', 'borrowed', 'done', 'rejected'];

    protected array $enumSTATUS = self::STATUS;

    protected $fillable = [
        'user_id', 'asset_id', 'status', 'total_borrowed', 'approval_id', 'return_approval_id', 'date_borrow', 'date_return', 'description_borrow',
    ];

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

    public function scopeFinished($query)
    {
        return $query->where('status', Arr::except($this::STATUS, ['pending', 'approved', 'borrowed']));
    }

    public function scopeOnProgress($query)
    {
        return $query->where('status', Arr::except($this::STATUS, ['done', 'rejected']));
    }

    public function scopeStatusOnly($query, $status = [])
    {
        return $query->whereIn('status', $status);
    }
}
