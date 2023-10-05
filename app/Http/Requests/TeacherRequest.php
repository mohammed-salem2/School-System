<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:teachers,email,' .$this->id,
            'password' => 'required',
            'name' => 'required',
            'name_en' => 'required',
            'specialization_id' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'joining_date' => 'required|date|date_format:Y-m-d',
            'address' => 'required',
            'image' => ['nullable', 'image', 'max:512000'],
        ];
    }
    public function messages()
    {
        return [
            'email.required' => trans('validation.required'),
            'email.unique' => trans('validation.unique'),
            'password.required' => trans('validation.required'),
            'name.required' => trans('validation.required'),
            'name_en.required' => trans('validation.required'),
            'specialization_id.required' => trans('validation.required'),
            'gender.required' => trans('validation.required'),
            'status.required' => trans('validation.required'),
            'joining_date.required' => trans('validation.required'),
            'address.required' => trans('validation.required'),
        ];
    }
}
