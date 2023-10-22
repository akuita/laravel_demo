<?php

namespace App\Models;

use App\Models\Traits\Auth\HasAttemptLocked;
use App\Models\Traits\Auth\HasAuthenticatable;
use App\Models\Traits\Auth\HasLoginSuccessTrace;
use App\Models\Traits\FilterQueryBuilder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens , HasLoginSuccessTrace, HasAttemptLocked, HasAuthenticatable;
    use FilterQueryBuilder;

    protected $table = 'users';

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
        'encrypted_password',
        'password',
        'password_confirmation',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function abcs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Abc::class, 'user_id');
    }
}
