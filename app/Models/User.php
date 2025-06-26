<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role',
        'frozen_at',
    ];

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
            'frozen_at' => 'datetime',
        ];
    }

    /**
     * Check if user has a specific role
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if user is regular user
     */
    public function isUser(): bool
    {
        return $this->hasRole('user');
    }

    /**
     * Check if user account is frozen
     */
    public function isFrozen(): bool
    {
        return !is_null($this->frozen_at);
    }

    /**
     * Check if user can login (not frozen)
     */
    public function canLogin(): bool
    {
        return !$this->isFrozen();
    }

    /**
     * Get status label
     */
    public function getStatusAttribute(): string
    {
        return $this->isFrozen() ? 'Frozen' : 'Active';
    }

    /**
     * Get role badge color
     */
    public function getRoleBadgeColorAttribute(): string
    {
        return $this->isAdmin() ? 'bg-red-100 text-red-800' : 'bg-blue-100 text-blue-800';
    }

    /**
     * Get status badge color
     */
    public function getStatusBadgeColorAttribute(): string
    {
        return $this->isFrozen() ? 'bg-gray-100 text-gray-800' : 'bg-green-100 text-green-800';
    }
}
