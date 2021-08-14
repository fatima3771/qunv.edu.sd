<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentMembershipRegistrationRequest extends FormRequest
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
            'nameEn' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users|confirmed',
            'password' => 'required|string|min:6|confirmed',
            'DOB' => 'required|date',
            'phoneNo' => 'required|string',
            'nationalNo' => 'required|string',
            'degree' => 'required',
            'university' => 'required',
            'level' => 'required',
            'confirmRegulations' => 'required',
            'confirmCorrectData' => 'required'
        ];
    }
}
