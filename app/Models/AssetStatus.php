<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetStatus extends Model
{
    use HasFactory;

    protected $table = 'asset_status';

    protected $fillable = ['assets_id', 'total_asset', 'maintenance', 'ready'];

    public function asset()
    {
        return $this->belongsTo(Assets::class);
    }
}
