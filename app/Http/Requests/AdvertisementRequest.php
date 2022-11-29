<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
            'page' => 'required',
            'title' => 'required',
            'external_url' => 'required',
            'section' => 'nullable',
            'direction' => 'nullable',
            'size' => 'required',
            'show_on' => 'required|in:mobile,web,both',
            'active' => 'required',
            'image' => 'nullable',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'external_url' => $this->external_url ?? url('/'),
        ]);
    }
}
