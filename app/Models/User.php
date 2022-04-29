<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ADMIN = 0;
    const LECTURER = 1;
    const STUDENT = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_validated'
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

    protected function roleName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 
                $value == self::ADMIN ? "Admin" : 
                ($value == self::LECTURER ? "Dosen" : 
                ($value == self::STUDENT ? "Mahasiswa" : "Tidak Diketahui")),
        );
    }

    // Check user role
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    public function course()
    {
        return $this->hasMany( related: Course::class);
    }
}
