<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $realtedServices = Service::latest()->where('service_category_id', $this->service_category_id)->limit(5)->get();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => $this->image,
            'description' => $this->description,
            'category_id' => $this->service_category_id,
            'category' => $this->category->name,
            'related' => ServiceResource::collection($realtedServices),
        ];
    }
}
