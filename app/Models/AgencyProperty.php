<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyProperty extends Model
{
    use HasFactory;

    protected $table ="agency_property";
    protected $fillable = ['property_id','owner_id','agency_id'];

    public function property()
    {
        return $this->belongsTo(Property::class,'property_id');
    }

    public function agency()
    {
        return $this->belongsTo(User::class,'agency_id');
    }
}
