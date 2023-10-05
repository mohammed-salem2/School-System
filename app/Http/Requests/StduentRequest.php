<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StduentRequest extends FormRequest
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
            'name' => 'required',
            'name_en' => 'required',
            'religion_id'=>'required',
            'gender' => 'required',
            'status' => 'required',
            'nationality_id' => 'required',
            'national_id' => 'required',
            'blood_id' => 'required',
            'date_birth' => 'required|date|date_format:Y-m-d',
            'grade_id' => 'required',
            'classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
            'image' => ['nullable', 'image', 'max:512000'],
        ];
    }
}
