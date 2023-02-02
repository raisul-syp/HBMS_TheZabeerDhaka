<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomFormRequest extends FormRequest
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
            'max_adults' => [
                'nullable'
            ],
            'max_childs' => [
                'nullable'
            ],
            'quantity' => [
                'nullable'
            ],
            'price' => [
                'nullable'
            ],
            'discount_rate' => [
                'nullable'
            ],
            'discount_price' => [
                'nullable'
            ],
            'image' => [
                'nullable',
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
