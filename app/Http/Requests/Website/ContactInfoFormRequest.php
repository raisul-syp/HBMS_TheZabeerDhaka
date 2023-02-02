<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfoFormRequest extends FormRequest
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
            'hotel_name' => [
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
            'google_map' => [
                'nullable'
            ],
            'phone_sales' => [
                'nullable'
            ],
            'phone_reservation' => [
                'nullable'
            ],
            'email_sales' => [
                'nullable'
            ],
            'email_reservation' => [
                'nullable'
            ],
            'display_order' => [
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
