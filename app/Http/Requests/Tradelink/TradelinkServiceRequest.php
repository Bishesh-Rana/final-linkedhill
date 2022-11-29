<?php

namespace App\Http\Requests\Tradelink;

use Illuminate\Foundation\Http\FormRequest;

class TradelinkServiceRequest extends FormRequest
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
            'slug' => ['required', 'unique:service_categories,slug,' . $this->id],
            'service_category_id' => 'required|exists:service_categories,id',
            'image' => ['nullable'],
            'description' => ['nullable'],
            'feature' => 'nullable'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'feature' => $this->feature == 'on' ? true : false,
        ]);
    }
}
