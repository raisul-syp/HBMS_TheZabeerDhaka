<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomtypeFormRequest extends FormRequest
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
            'description' => [
                'nullable',
            ],
            'image' => [
                'nullable',
                'mimes:jpg,jpeg,png'
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
                'nullable',
                'string'
            ],
            'created_by' => [
                'nullable',
                'string'
            ],
            'updated_by' => [
                'nullable',
                'string'
            ],
        ];
    }
}
