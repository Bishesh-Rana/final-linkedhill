<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    const TYPE_ADMIN = 'admin';
    const TYPE_AGENT = 'agent';

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'phone',
        'is_active',
        'featured_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'admin_role');
    }

    public function hasRole($roleId)
    {
        // return true;
        return in_array($roleId, $this->roles->pluck('id')->toArray());
    }

    public function imageUrl()
    {
        return ($this->featured_image != 'placeholder.jpg' && $this->featured_image !== null) ?
            asset('storage/admins/' . $this->featured_image) :
            asset('dashboard/img/placeholder.jpg');
    }

    /***
     *
     * Delete featured image from storage
     */
    public function deleteImage()
    {
        if ($this->featured_image != 'placeholder.jpg') {
            Storage::delete('public/admins/' . $this->featured_image);
        }
    }

    /**
     * admin id 1 is always superadmin
     */
    public function isSuperAdmin()
    {
        if (auth()->check() && $this->id === 1) {
            return true;
        }
    }
}
