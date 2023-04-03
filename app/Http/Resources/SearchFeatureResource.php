<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchFeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'values' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'profile' => $this->user->profile,
                'email' => $this->user->email,
                'mobile' => $this->user->mobile,
                'image' => $this->user->image,
                'full_address' => $this->user->full_address,
                'email_verified_at' => $this->user->email_verified_at,
                'is_active' => $this->user->is_active,
            ],
        ];
    }
}
