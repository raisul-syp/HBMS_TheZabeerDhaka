<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsFormRequest extends FormRequest
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
            'phone' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'string'
            ],
            'address' => [
                'required',
                'string'
            ],
            'display_order' => [
                'nullable'
            ],
            'logo' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'icon' => [
                'nullable',
                'mimes:jpg,jpeg,png'
            ],
            'social_fb' => [
                'nullable'
            ],
            'social_tw' => [
                'nullable'
            ],
            'social_insta' => [
                'nullable'
            ],
            'social_yt' => [
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
