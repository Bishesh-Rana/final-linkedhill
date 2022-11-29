<?php

namespace App\Actions\Property;

use App\Contracts\Actionable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CreateNewProperty implements Actionable
{
    public function create(array $data)
    {
        Validator::make($data, [
            'status' => ['required', 'boolean'],
            'property_status' => ['required', 'exists:purposes,id'],
            'type' => ['required', 'exists:types,id'],
            'title' => ['required', 'max:191'],
            'slug' => ['required', Rule::unique('properties', 'slug')],
            'property_detail' => ['nullable'],
            'property_address' => ['nullable'],
            'map_location' => ['nullable'],
            'meta_title' => ['required'],
            'meta_keyword' => ['required'],
        ])->validate();
    }
}
