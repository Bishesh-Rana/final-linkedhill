<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image'=>asset('images/propertyCategory/'.$this->image),

        ];
    }
}
