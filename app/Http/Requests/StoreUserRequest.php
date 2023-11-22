<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        // Validation rules for storing a user
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'credits' => 'numeric',
        ];
    }

    public function messages()
    {
        // Error messages for storing a user
        return [
            'name.required' => 'Indtast venligst et navn',
            'name.string' => 'Navnet skal være en tekst',
            'email.required' => 'Indtast venligst en email',
            'email.email' => 'Indtast venligst en gyldig email',
            'email.unique' => 'Bruger med denne email findes allerede',
            'password.required' => 'Indtast venligst et password',
            'credits.numeric' => 'Credits skal være et tal'
        ];
    }
}
