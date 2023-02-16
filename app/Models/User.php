<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public const STATUSTYPE = [
        'active' => 'active',
        'suspended' => 'suspended',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['role_names'];

    protected array $enumStatustype = self::STATUSTYPE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the User Role Name.
     *
     * @return string
     */
    public function getRoleNamesAttribute()
    {
        return $this->roles->pluck('name')->first();
    }

    //# SCOPE QUERY
    public function scopeListByActorRole($query)
    {
        if (! Auth::user()->hasRole(Role::ROLETYPE['super_admin'])) {
            $query = $query->whereDoesntHave('roles', function (Builder $query) {
                $query->where('name', Role::ROLETYPE['super_admin']);
            });
        }

        return $query->with('roles');
    }
}
