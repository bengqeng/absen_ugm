<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;
    protected $table = 'users_role';

    public const ROLES = [
        'super_admin'  => 'super_admin',
        'admin' => 'admin',
        'user'  => 'user'
    ];

    protected array $enumRoles = self::ROLES;

    /**
     * Get owner of role.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
