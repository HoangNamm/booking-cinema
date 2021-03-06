<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditFilmRequest extends FormRequest
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
            'name' => 'required|max:255',
            'actor' => 'required|string',
            'producer' => 'required|max:100',
            'director' => 'required|string',
            'duration' => 'required|integer|min:90|max:180',
            'describe' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
            'categories' => 'required',
            'categories.*' => 'required',
            'cinemas' => 'required',
            'cinemas.*' => 'required',
            'photos.*' => 'image|mimes:jpg,png,jpeg|max:2048',
            'country' => 'required|string'
        ];
    }

    /**
     * Custom message error for rules
     *
     * @return void
     */
    public function messages()
    {
        return [
            'name.required' => trans('film.admin.add.message.require_name'),
            'categories.required' => trans('film.admin.add.message.require_category'),
            'actor.required' => trans('film.admin.add.message.require_actor'),
            'producer.required' => trans('film.admin.add.message.require_producer'),
            'director.required' => trans('film.admin.add.message.require_director'),
            'duration.required' => trans('film.admin.add.message.require_duration'),
            'describe.required' => trans('film.admin.add.message.require_describe'),
            'start_date.required' => trans('film.admin.add.message.require_start_date'),
            'end_date.required' => trans('film.admin.add.message.require_end_date'),
            'photos.max' => trans('film.admin.add.message.size_image'),
            'country.required' => trans('film.admin.add.message.require_country')
        ];
    }
}
