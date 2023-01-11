<?php

namespace App\Http\Resources;

use App\Models\Tradelink;
use Illuminate\Http\Resources\Json\JsonResource;

class TradelinkDetailResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->image,
            'profession' => $this->category->title,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'description' => $this->description,
            'related' => TradelinkResource::collection(Tradelink::where('category_id', $this->category_id)->limit(5)->get())
        ];
    }
}
