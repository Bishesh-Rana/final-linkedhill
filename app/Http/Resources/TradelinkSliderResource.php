<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TradelinkSliderResource extends JsonResource
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
            'image' => asset('tradelink/slider/'.$this->image),


        ];
    }
}
