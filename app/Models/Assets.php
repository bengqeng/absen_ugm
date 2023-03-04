<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $table = 'assets';

    protected $fillable = ['name', 'type', 'description', 'asset_category_id'];

    public function status()
    {
        return $this->hasOne(AssetStatus::class);
    }

    public function asset_category()
    {
        return $this->belongsTo(AssetCategory::class);
    }

    public function canBorrowed()
    {
        return $this->status->ready > 0;
    }
}
