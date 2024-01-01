<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
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
        'password' => 'hashed',
    ];

    public function getRouteKeyName(): string
    {
        return 'email';
    }

    public function setPasswordAttribute(string $password): void
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function setNameAttribute(string $name): void
    {
        $this->attributes['name'] = ucwords($name);
    }

    public function logout(): void
    {
        $this->tokens()->delete();
    }

//    public function price(){
//        return Attribute::make(
//            get: fn($value) => $value / 100,
//            set: fn($value) => $value * 100
//        );
//    }

    public static function add(int $a, int $b): int
    {
        return $a + $b;
    }
}
