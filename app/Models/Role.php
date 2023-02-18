<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Role extends \Spatie\Permission\Models\Role
{
    // 1 user 1 role
    use HasFactory;

    protected $table = 'roles';

    public const ROLETYPE = [
        'admin' => 'admin',
        'super_admin' => 'super_admin',
        'staff' => 'staff',
    ];

    protected array $enumRoletype = self::ROLETYPE;

    public function scopeListRoleByActor($query)
    {
        if (! Auth::user()->hasRole(Role::ROLETYPE['super_admin'])) {
            $query = $query->whereNot(function ($query) {
                $query->where('name', Role::ROLETYPE['super_admin']);
            });
        }

        return $query;
    }
}
