<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'password', 'role_id', 'first_name', 'last_name'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's gravatar.
     *
     * @return string
     */
    public function getAvatarAttribute()
    {
        // return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
        // return 'https://api.dicebear.com/7.x/thumbs/svg?seed=' . urlencode($this->email);
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name);
    }

    public function isAdmin(): bool
    {
        return $this->role_id == UserRole::ADMIN->value;
    }

    /**
     * Get the user's role.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class);
    }

    /**
     * Get the info of user.
     */
    public function info(): HasOne
    {
        return $this->hasOne(UserInfo::class);
    }

    /**
     * Get the orders of user.
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
