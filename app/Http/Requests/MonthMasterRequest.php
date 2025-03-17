<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonthMasterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sal_holy_days' => 'required|integer|min:0|max:31',
        ];
    }
    public function messages()
    {
        return [
            'sal_holy_days.required' => 'Please enter the number of Holy Days.',
            'sal_holy_days.integer'  => 'The number of Holy Days must be a valid integer.',
            'sal_holy_days.min'      => 'The number of Holy Days cannot be negative.',
            'sal_holy_days.max'      => 'The number of Holy Days cannot exceed 31.',
        ];
    }
}
