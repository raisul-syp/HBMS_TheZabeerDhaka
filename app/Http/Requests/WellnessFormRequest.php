<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WellnessFormRequest extends FormRequest
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
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],
            'short_description' => [
                'required',
                'string'
            ],
            'long_description' => [
                'nullable'
            ],
            'logo_image' => [
                'nullable',
            ],
            'image' => [
                'nullable',
            ],
            'is_active' => [
                'nullable'
            ],
            'is_delete' => [
                'nullable'
            ],
            'meta_title' => [
                'required',
                'string'
            ],
            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_decription' => [
                'nullable'
            ],
            'created_by' => [
                'nullable'
            ],
            'updated_by' => [
                'nullable'
            ],
        ];
    }
}
