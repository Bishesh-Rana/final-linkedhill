<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'icon',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'category_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_property_category', 'property_category_id', 'feature_id');
    }
}
