<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CityRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'nullable',
            'slug' => 'required',
            'province_id' => 'required',
            'district' => 'required',
            'meta_keyword' => 'nullable',
            'meta_description' => 'nullable',

        ];
    }
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'meta_keyword' => $this->meta_keyword ?? $this->name,
            'meta_description' => $this->meta_description ?? Str::limit(strip_tags($this->name), 120, '...')
        ]);
    }
}
