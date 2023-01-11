<?php

namespace App\Http\Resources;

use App\Models\Property;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyDetailResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $favourite = auth('api')->check() ? auth('api')->user()->favProperties()->pluck('property_id')->toArray() : [];
        $relatedProperties = Property::where('city_id', $this->city_id)
            ->where('properties.id', '<>', $this->id)
            ->with('area_unit', 'property_category:id,name', 'images')
            ->latest()
            ->limit(6)
            ->get();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->property_detail,
            'category' => $this->property_category->name,
            'price_range' => $this->start_price . '-' . $this->end_price,
            'address' => $this->property_address,
            'area' => $this->total_area . ' ' . $this->area_unit->name,
            'new' => $this->created_at->gt(now()->subDays(7)),
            'is_liked' => in_array($this->id, $favourite),

            'images' => $this->images->map(function ($n) use ($request) {
                return array(
                    'id' => $n->id,
                    'image' => $n->name

                );
            }),
            'features' => $this->features->map(fn ($feature) => [
                'id' => $feature->id,
                'title' => $feature->title,
                'image' => $feature->image,
                'value' => $feature->pivot->value == "1" ? true : $feature->pivot->value,
            ]),
            'nearBy' => PropertyResource::collection($relatedProperties),
            'amenities' => $this->amenities->map(fn ($amenity) => [
                'name' => $amenity->name,
                'image' => $amenity->image,
                'id' => $amenity->id,
            ])




        ];
    }
}
