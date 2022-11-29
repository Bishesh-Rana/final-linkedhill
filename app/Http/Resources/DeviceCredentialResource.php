<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceCredentialResource extends JsonResource
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
            'ip_address' => $this->ip_address,
            'agent' => $this->agent,
            'country' => $this->country,
            'countryCode' => $this->countryCode,
            'region' => $this->region,
            'regionName' => $this->regionName,
            'city' => $this->city,
            'zip' => $this->zip,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'location' => $this->ip_address,
            'time' => $this->created_at->toRfc850String(),
        ];
    }
}
