<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferFormRequest extends FormRequest
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
            'offer_category' => [
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
            'start_date' => [
                'nullable',
            ],
            'end_date' => [
                'nullable',
            ],
            'thumb' => [
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
