<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'rating' => (float) $this->rating,
            'review' => $this->description,
            'customer' => $this->reviewer->name,
            'date'=>$this->created_at->diffForHumans()
        ];
    }
}
