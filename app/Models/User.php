<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_surname',
        'email',
        'password',
        'profile_image',
        'phone_number',
        'phone_verification_code',
        'phone_is_verified',
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

    protected $guard_name = 'api';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    // app/Models/User.php

    public function getFormattedNameAttribute(): string
    {
        $parts = explode(' ', trim($this->name_surname));
        $count = count($parts);

        if ($count === 1) {
            return $parts[0];
        }

        $firstName = $parts[0];
        $lastNameInitial = mb_substr($parts[$count - 1], 0, 1) . '.';

        if ($count >= 3) {
            $secondName = $parts[1];
            return "$firstName $secondName $lastNameInitial";
        }

        return "$firstName $lastNameInitial";
    }

}
