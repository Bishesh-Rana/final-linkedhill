<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogRequest extends FormRequest
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
            'slug' => 'required',
            'image' => 'nullable',
            'featured' => 'boolean',
            'description' => 'required',
            'meta_keyword' => 'max:300',
            'meta_description' => 'max:300'
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
            'meta_keyword' => $this->meta_keyword ?? $this->title,
            'meta_description' => $this->meta_description ?? Str::limit(strip_tags($this->description), 120, '...'),
            'slug' => Str::slug($this->slug),
            'featured' => $this->featured ? true : false
        ]);
    }
}
