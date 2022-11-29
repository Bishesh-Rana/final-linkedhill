<?php

namespace App\Http\Requests;

use App\Models\Menu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class MenuRequest extends FormRequest
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
            'slug' => ['required', 'unique:menus,id,' . $this->menu],
            'url' => ['nullable', 'url'],
            'type' => ['required', 'in:' . implode(',', array_keys(Menu::TYPE))],
            'show' => ['required'],
            'image' => ['nullable'],
            'order' => ['nullable', 'numeric'],
            'description' => ['nullable'],
            'active' => ['nullable']
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'order' => $this->order ?? 1,
        ]);
    }
}
