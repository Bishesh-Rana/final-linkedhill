<?php

namespace App\Http\Requests\Tradelink;

use Illuminate\Foundation\Http\FormRequest;

class TradelinkWebsiteRequest extends FormRequest
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
            'website_title'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'copyright_message'=>'required',
            'short_description'=>'required',
        ];
    }
}
