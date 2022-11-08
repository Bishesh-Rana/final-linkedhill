<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Property extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'user_id', 'category_id', 'property_status', 'type', 'title', 'slug', 'property_detail',
        'property_address', 'map_location', 'city_id', 'bed_id', 'bath_id', 'area_id', 'zipcode',
        'total_area', 'total_area_unit', 'built_up_area', 'built_up_area_unit', 'property_facing', 'road_access', 'road_access_unit', 'road_type',
        'start_price', 'end_price', 'price_label',
        'owner_name', 'owner_address', 'owner_phone', 'youtube_video_id',
         'bed', 'bath', 'negotiable',
        'feature',
        'meta_keyword',
        'meta_description',
        'insurance',
        'verified_by', 'verified_at', 'hasAgent'

    ];

    protected $casts = [
        'feature' => 'boolean',
        'insurance' => 'boolean',
        'negotiable' => 'boolean',
        'hasAgent' => 'boolean',
        'start_price' => 'decimal:2',
        'end_price' => 'decimal:2',

    ];

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_property', 'property_id', 'feature_id')->withPivot('value');
    }
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities', 'property_id', 'amenity_id');
    }

    public function area_unit()
    {
        return $this->belongsTo(Unit::class, 'total_area_unit');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function property_category()
    {
        return $this->belongsTo(PropertyCategory::class, 'category_id');
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class, 'built_up_area_unit');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }

    public function agent()
    {
        return $this->hasOne(AgencyProperty::class, 'property_id');
    }
    public function faqs()
    {
        return $this->hasMany(PropertyFaq::class, 'property_id')->orderBy('created_at', 'ASC');
    }

    public function scopeSuperAdmin($query)
    {
        $value = auth()->user()->hasAnyRole('Super Admin', 'Admin');
        return $query->when(!$value, fn () => $query->where('user_id', auth()->id()));
    }

    public function scopeFilter($builder)
    {

        app(\Illuminate\Pipeline\Pipeline::class)
            ->send($builder)
            ->through(
                $this->getFilters()
            )
            ->thenReturn();
    }

    public function getImageAttribute()
    {
        return optional($this->images()->first())->name;
    }

    protected function getFilters(): array
    {
        return [
            \App\QueryFilters\Price::class,
            \App\QueryFilters\FrontSearch::class,
            \App\QueryFilters\Area::class,
            \App\QueryFilters\Location::class,
            \App\QueryFilters\Purpose::class,
            \App\QueryFilters\Category::class,
            \App\QueryFilters\City::class,
            \App\QueryFilters\Title::class,
            \App\QueryFilters\Type::class,
        ];
    }
}
