<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Customer extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $guard = 'web';

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'mobile',
        'otp',
        'email_verified_at',
        'profile',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
