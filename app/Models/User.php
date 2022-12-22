<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    use SoftDeletes;
    /**
     * Event Booting.
     *
     * @var array
     */
    public static function boot()
    {
        parent::boot();
        static::created(function ($item) {
            $item->referral_code = Str::random(10);
            $item->save();
        });
    }
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'mobile',
        'otp',
        'email_verified_at',
        'profile',
        'is_active',
        'reward_point',
        'referred_by',
        'referral_code',
        'user_id',
        'image',
        'full_address'
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

    public function user(){
        return $this->hasMany(User::class,'user_id');
    }

    // public function hasAgency()
    // {
    //     return $this->hasOne(AgencyDetail::class,'user_id','user_id');
    // }
    public function hasAgency()
    {
        return $this->hasOne(AgencyDetail::class);
    }

    public function agentStaff()
    {
        return $this->hasOne(AgencyDetail::class , 'user_id' ,'user_id');
    }
    public function appliedAgencies()
    {
        return $this->hasMany(UserAgent::class, 'user_id');
    }
    // public function isSuper()
    // {
    //     $user = auth 
    //     return true;
    // }
    public function isStaff()
    {
        if(auth()->user()->hasAgency()){
            return auth()->user()->user_id;
        }
        else{
            return auth()->user()->id;
        }
    }

    public function properties()
    {
        if(auth()->user()->agentStaff != null){
            return $this->hasMany(Property::class, 'user_id','user_id');
        }
        else{
            return $this->hasMany(Property::class, 'user_id');
        }
    }

    public function isAdmin()
    {
        $role_slug = Str::slug(auth()->user()->roles[0]->name ?? null);
        if($role_slug == 'super-admin' || $role_slug == 'admin'){
            return true;
        }else{
            return false;
        }
    }

    public function scopeVisible($query)
    {
        if(!auth()->user()->isAdmin()){
            // dd(auth()->user()->agentStaff);
            if(auth()->user()->agentStaff){
                $query->where('user_id', auth()->user()->user_id);
            }
            else{
                $query->where('user_id', auth()->user()->id);
            }
            
        }
    }

    public function  agency_property()
    {
        return $this->hasMany(AgencyProperty::class, 'owner_id');
    }

    public function favProperties()
    {
        return $this->hasMany(FavouriteList::class, 'user_id')->whereNotNull('property_id');
    }

    public function favouriteProperties()
    {
        return $this->belongsToMany(Property::class, 'favourite_lists', 'user_id', 'property_id');
    }

    public function assignedAgency()
    {
        return $this->hasMany(AgencyProperty::class, 'agency_id');
    }

    public function agents()
    {
        return $this->belongsToMany(UserAgent::class, 'user_agent', 'user_id', 'agent_id');
    }
    public function setNewApiToken()
    {
        $this->api_token = Str::uuid();
        $this->save();
    }

    public function booking()
    {
        return $this->belongsToMany(Tradelink::class, 'tradelink_books', 'user_id', 'tradelink_id');
    }

    public function book()
    {
        return $this->hasMany(TradelinkBook::class, 'user_id');
    }
}
