<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteRequest extends FormRequest
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
            'logo' => 'nullable',
            'logo_footer' => 'nullable',
            'favicon' => 'nullable',
            'alternate_email' => 'nullable',
            'currency' => 'nullable',
            'fb_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
            'youtube_url' => 'nullable',
            'playstore_url' => 'nullable',
            'appstore_url' => 'nullable',
            'map_url' => 'nullable',
            'address' => 'nullable',
            'email' => 'required',
            'short_description' => 'nullable',
            'phone' => 'nullable',
            'alternate_email' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keyword' => 'max:250',
            'meta_description' => 'max:250',
            'pro_title' => 'nullable',
            'pro_sub_title' => 'nullable',
            'second_pro_title' => 'nullable',
            'second_pro_sub_title' => 'nullable',
            'blog_title' => 'nullable',
            'blog_sub_title' => 'nullable',
            'login_title' => 'nullable',
            'login_sub_title' => 'nullable',
            'second_login_sub_title' => 'nullable',
            'third_login_sub_title' => 'nullable',
            'four_login_sub_title' => 'nullable',

        ];
    }
}
