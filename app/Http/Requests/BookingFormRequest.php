<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            'guest_id' => [
                'required',
            ],
            'room_id' => [
                'required',
            ],
            'staff_id' => [
                'required',
            ],
            'checkin_date' => [
                'required',
            ],
            'checkout_date' => [
                'required',
            ],
            'checkin_time' => [
                'required',
            ],
            'checkout_time' => [
                'required',
            ],
            'total_adults' => [
                'required',
            ],
            'total_childs' => [
                'required',
            ],
            'booking_status' => [
                'nullable',
            ],
            'is_delete' => [
                'nullable',
            ],
            'payment_mode' => [
                'required',
            ],
            'booking_comment' => [
                'nullable',
            ],
            'created_by' => [
                'nullable',
            ],
            'updated_by' => [
                'nullable',
            ],
        ];
    }
}
