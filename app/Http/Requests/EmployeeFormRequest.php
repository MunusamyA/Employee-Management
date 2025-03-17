<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeFormRequest extends FormRequest
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
            'emp_name'      => 'required|string|max:255',
            'emp_email'     => 'required|email|unique:tbl_employees,emp_email|max:255',
            'emp_mob_no'    => 'required|numeric|digits:10|unique:tbl_employees,emp_mob_no',
            'emp_dob'       => 'required|date|before:-18 years',
            'emp_gender'    => 'required|in:1,2,3',
            'emp_dpt'       => 'required|string|max:255',
            'emp_position'  => 'required|string|max:255',
            'emp_salary'  => 'required',
            'emp_photo'     => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'emp_email.required' => 'Please enter your email!',
            'emp_email.email'    => 'Enter a valid email format!',
            'emp_email.unique'   => 'This email is already taken!',
            'emp_mob_no.required'   => 'This Mobile No. Field Required',
            'emp_mob_no.numeric'   => 'This Mobile No. Number only allowed',
            'emp_mob_no.digits'   => 'This Mobile No. must be 10 Digits!',
            'emp_mob_no.unique'   => 'This Mobile No. is already taken!',
            'emp_dob.required'   => 'You must provide your date of birth!',
            'emp_salary.required'   => 'This Salary field is Required!',
            'emp_dob.before'     => 'Only users 18 years or older can register!',
        ];
    }
}
