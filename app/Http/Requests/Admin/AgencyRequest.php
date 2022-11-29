<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'agency_name' =>'required',
            'address' =>'required',
            'agency_mobile' =>'required',
            'short_intro' =>'required',
            'meta_keyword' =>'max:300',
            'meta_description' =>'max:300'
        ];
    }
}
