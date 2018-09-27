<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateScheduleRequest extends FormRequest
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
            'film' => 'required|exists:films,id',
            'room' => 'required|exists:rooms,id',
            'starttime' => 'required|date_format:d-m-Y H:i|after:'. date('Y-m-d'),
            'endtime' => 'required|date_format:d-m-Y H:i|after:starttime',
            'type' => 'required|string',
            'price' => 'required|min:1'
        ];
    }
}
