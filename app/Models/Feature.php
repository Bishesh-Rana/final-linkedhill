<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    public const TYPE  = [
        '1' => 'text', '2' => 'boolean'
    ];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsToMany(PropertyCategory::class, 'feature_property_category',  'feature_id','property_category_id');
    }

    public function childFeature()
    {
        return $this->hasMany(Feature::class, 'parent_id');
    }

    public function getParsedTypeAttribute()
    {
        return self::TYPE[$this->type];
    }
}
