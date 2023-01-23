<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'province_id',
        'district',
        'meta_keyword',
        'meta_description'
    ];

    public function areas()
    {
        return $this->hasMany(Area::class, 'city_id');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'city_id');
    }


    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function districts()
    {
        return $this->belongsTo(District::class, 'district', 'id');
    }
}
