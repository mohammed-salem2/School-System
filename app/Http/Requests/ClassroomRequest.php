<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            // 'name.*' => 'required|string',
            // 'name_en.*' => 'required|string',
            // 'grade_id.*' => 'required|int|exists:grades,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required'),
            'name.strings' => __('validation.string'),
            // 'name_en.required' => __('validation.required'),
            // 'name_en.strings' => __('validation.string'),
            'grade_id.required'=> __('validation.required'),
            'grade_id.exists' => __('validation.exists'),
        ];
    }
}
