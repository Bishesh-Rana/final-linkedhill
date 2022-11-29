<?php

namespace App\Http\Resources;

use App\Models\AgencyDetail;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class PropertyResource extends JsonResource
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
        return [
            'id'=>$this->id,
            'title' => $this->title,
            'category' => $this->property_category->name,
            'price_range' => $this->start_price .'-'.$this->end_price,
            'address' => $this->property_address,
            'area' => $this->total_area . ' ' . $this->area_unit->name,
            'new' => $this->created_at->gt(now()->subDays(7)),
            'is_liked' => in_array($this->id, $favourite),
            'bedroom' => rand(1, 3),
            'bathroom' => rand(1, 3),
            'image' => optional($this->images->first())->name

        ];
    }
}
