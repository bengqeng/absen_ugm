<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends \Spatie\Permission\Models\Role
{
    use HasFactory;

    protected $table = 'roles';

    public const ROLETYPE = [
        'admin' => 'admin',
        'super_admin' => 'super_admin',
        'staff' => 'staff',
    ];

    protected array $enumRoletype = self::ROLETYPE;
}
