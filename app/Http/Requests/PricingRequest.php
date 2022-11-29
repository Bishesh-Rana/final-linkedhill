<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PricingRequest extends FormRequest
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

        return [
            'title' => 'required',
            'image' => 'nullable',
            'slug' => [
                'required',
                Rule::unique('pricings')->ignore($this->pricing)
            ],
            'description' => ['nullable'],
            'features' => ['array'],
            'price' => ['numeric', 'nullable']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
