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
    public $preserveKeys = true;
    public function toArray($request)
    {
        $favourite = auth('api')->check() ? auth('api')->user()->favProperties()->pluck('property_id')->toArray() : [];
        // return [
        //     'id'=>$this->id,
        //     'order'=>$this->order,
        //     'title' => $this->title,
        //     'property_status'=>$this->property_status,
        //     'category' => $this->property_category->name,
        //     'type' => $this->type,
        //     'slug' => $this->slug,
        //     'property_detail'=>$this->property_detail,
        //     'property_address'=>$this->property_address,
        //     'map_location'=>$this->map_location,
        //     'city_id'=>$this->city_id,
        //     'bed'=>$this->bed,
        //     'bath'=>$this->bath,
        //     'address' => $this->property_address,
        //     'price_range' => (int)$this->start_price,
        //     'area' => $this->total_area . ' ' . $this->area_unit->name||'',
        //     'new' => $this->created_at->gt(now()->subDays(7)),
        //     'is_liked' => in_array($this->id, $favourite),
        //     'image' => optional($this->images->first())->name,
        //     'built_up_area'=>$this->built_up_area. ' ' . $this->area_unit->name ,
        //     'property_facing'=>$this->property_facing,
        //     'road_width'=>$this->road_width.''. $this->road_width_unit ,
        //     'road_access_length'=> $this->road_access,
        //     'road_access_unit' => $this->road_access_unit,
        //     'road_type'=>$this->road_type,
        //     'price_label'=> $this->price_label,
        //     'youtube_video_id'=> $this->youtube_video_id,
        //     'feature'=> $this->feature,
        //     'insurance'=> $this->insurance,
        //     'negotiable' => $this->negotiable ,
        //     'user' =>  $this->user->name,
        //     'view_count' => $this->view_count,
        //     'premium_property'=> $this->premium_property,
        //     'meta_keyword' => $this->meta_keyword ,
        //     'meta_description' => $this->meta_description,
        // ];

        return [
            'id'=>$this->id,
            'title' => $this->title,
            'category' => $this->property_category->name,
            'price_range' => $this->start_price,
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
