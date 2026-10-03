<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @property string|null $remember_token
     * @property string $status
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi user dengan role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Apakah user memegang role tertentu.
     *
     * Menggunakan relasi Role karena User menyimpan role_id,
     * bukan kolom role berupa string.
     */
    public function hasRole(string $role): bool
    {
        return $this->role?->name === $role && $this->isActive();
    }

    /**
     * Apakah user merupakan admin.
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Apakah user merupakan operator tenant.
     */
    public function isTenantOperator(): bool
    {
        return $this->hasRole('tenant');
    }

    /**
     * Apakah status user aktif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}