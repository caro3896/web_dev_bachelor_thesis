<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
        // Validation rules for user login
        return [
            'email' => 'required', 'email',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        // Error messages for storing a reward
        return [
            'email.required' => 'Indtast venligst en email',
            'email.email' => 'Indtast venligst en gyldig email',
            'password.required' => 'Indtast venligst et password',
        ];
    }
}
