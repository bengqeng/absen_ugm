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

    public const STATUSGENDER = [
        'M' => 'Laki-Laki',
        'F' => 'Perempuan',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['role_names'];

    protected array $enumStatustype = self::STATUSTYPE;

    protected array $enumStatusgender = self::STATUSGENDER;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status_type',
        'project_id',
        'phone_number',
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

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

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

    //# SCOPE QUERY with ROLE
    public function scopeListByRole($query, $role = [])
    {
        if (! is_array($role)) {
            return null;
        }

        return $query->whereHas('roles', function (Builder $query) use ($role) {
            $query->whereIn('name', $role);
        });
    }

    /**
     * Get the comments for the blog post.
     */
    public function assetSubmissions()
    {
        return $this->hasMany(AssetSubmission::class);
    }
}
