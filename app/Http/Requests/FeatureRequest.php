<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'url'],
            'type' => ['required', 'numeric'],
            'postion' => ['nullable'],
            'category_id' => ['required', 'array'],
            'category_id.*' => ['exists:property_categories,id']
        ];
    }
}
