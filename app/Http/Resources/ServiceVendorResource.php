<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceVendorResource extends JsonResource
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
            'vendors'=>$this->vendors->map(function($n) use($request){

                return array(
                    'vendor_id' =>$n->vendor->id,
                    'vendor_name' => $n->vendor->name,
                    'vendor_phone'=>$n->vendor->phone

                );
            }),
        ];
    }
}
