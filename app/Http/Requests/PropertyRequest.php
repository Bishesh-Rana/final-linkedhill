<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =  [
            'status' => ['nullable'],
            'property_status' => ['nullable'],
            'type' => ['nullable'],
            'title' => ['required'],
            'slug' => ['required'],
            'insurance' => ['required', 'boolean'],
            'property_detail' => ['required'],
            'property_address' => ['required'],
            'map_location' => ['nullable'],
            'city_id' => ['required', 'exists:cities,id'],
            'area_id' => ['nullable', 'exists:areas,id'],
            'zipcode' => ['nullable'],
            'total_area' => ['nullable'],
            'total_area_unit' => ['nullable'],
            'built_up_area' => ['nullable'],
            'built_up_area_unit' => ['nullable'],
            'property_facing' => ['nullable'],
            'road_access' => ['nullable'],
            'road_access_unit' => ['nullable'],
            'road_type' => ['nullable'],
            'built_year' => ['nullable'],
            'built_year_month' => ['nullable'],
            'start_price' => ['nullable'],
            'end_price' => ['nullable'],
            'price_label' => ['nullable'],
            'owner_name' => ['nullable'],
            'owner_address' => ['nullable'],
            'owner_phone' => ['nullable'],
            'owner_email' =>['nullable'],
            'youtube_video_id' => ['nullable'],
            'feature' => ['required', 'boolean'],
            'negotiable' => ['nullable', 'boolean'],
            'user_id' => ['nullable'],
            'admin_id' => ['nullable'],
            'category_id' => ['nullable'],
            'view_count' => ['nullable'],
            'premium_property' => ['nullable'],
            'hasAgent' => ['required', 'boolean'],
            'features' => ['nullable', 'array'],
            'amenities' => ['nullable', 'array'],
            'verified_by' => ['nullable'],
            'verified_at' => ['nullable'],
            'bed'=>'nullable|integer',
            'bath'=>'nullable|integer'

        ];
        $imageValidation =  request()->isMethod('post')  ? ['property_images' => ['required', 'array'], ['property_images.*' => ['image']]] : ['property_images' => ['nullable']];
        return array_merge($imageValidation, $rules);
    }

    public function prepareForValidation()
    {
        $this->merge([
            'insurance' => $this->insurance ? true : false,
            'negotiable' => $this->negotiable ? true : false,
            'feature' => $this->feature ? true : false,
            'hasAgent' => auth()->user()->hasRole('Agent'),
            'user_id' => auth()->id(),
            'verified_by' => auth()->user()->hasAnyRole('Super Admin', 'Admin') ? auth()->id() : null,
            'verified_at' => auth()->user()->hasAnyRole('Super Admin', 'Admin') ? now() : null,
            'start_price' => $this->start_price ?? 0,
            'features' => $this->features ?? [],
            'slug' => Str::slug($this->title)
        ]);
    }
}
