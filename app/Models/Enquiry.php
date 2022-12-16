<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'contact_info', 'message', 'subject', 'property_id'
    ];

    public function getProperty()
    {
        return $this->hasOne(Property::class,'id','property_id');
    }
}
