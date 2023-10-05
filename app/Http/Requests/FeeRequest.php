<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeRequest extends FormRequest
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
            'title' => 'required|string',
            'title_en' => 'required|string',
            'grade_id' => 'required|int|exists:grades,id',
            'classroom_id' => 'required|int|exists:classrooms,id',
            'description' => 'nullable',
            'year' => 'required',
            'amount' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('validation.required'),
            'title.strings' => __('validation.string'),
            'title_en.required' => __('validation.required'),
            'title_en.strings' => __('validation.string'),
            'year.required' => __('validation.required'),
            'amount.required' => __('validation.required'),
            'grade_id.required' => __('validation.required'),
            'grade_id.exists' => __('validation.exists'),
            'classroom_id.required' => __('validation.required'),
            'classroom_id.exists' => __('validation.exists'),
        ];
    }
}
