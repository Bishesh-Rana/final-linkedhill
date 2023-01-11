<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TradelinkBookingResource extends JsonResource
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
            'date' => Carbon::parse($this->date)->toRfc850String(),
            'booking_id' => $this->booking_id,
            'status' => $this->status,
        ];
    }
}
