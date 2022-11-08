<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgencyDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'agency_name', 'agency_email', 'website', 'address', 'agency_phone', 'agency_mobile',
        'type', 'national_id', 'company_reg_no', 'vat_pan_no', 'verified_at', 'logo','other_document','status'
    ];
    public const TYPE = [
        '1' => 'Individual',
        '2' => 'Company'
    ];

    public const STATUS = [
        '1' => 'Verified',
        '2' => 'Not Verified',
        '3' => 'Blocked',
        '4' => 'Rejected'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getLogoAttribute($name)
    {
        return asset('images/logo/') . '/' . $name;
    }

    public function getStatusAttribute()
    {
        return Self::STATUS[$this->attributes['status']] ?? self::STATUS[1];
    }
}
