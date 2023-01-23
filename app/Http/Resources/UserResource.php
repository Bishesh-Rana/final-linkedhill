<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email ?? '',
            'image' => $this->image,
            'phone' => $this->phone,
            'dob' => $this->dob,
            'full_address' => $this->full_address,
            'image' => $this->profile,
            'accessToken' => $this->access_token,
            'referral_code' => $this->referral_code,
            'reward' => $this->reward_point,
            'user_id' => $this->user_id,
            'role' => $this->roles[0]->name,
        ];
    }
}
