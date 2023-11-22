<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // Validation rules for updating a user
        return [
            'id' => 'exists:App\Models\User,id',
            'name' => 'required|string',
            'email' => 'unique:users,email,' . $this->get('id'),
            'password' => 'sometimes',
            'admin' => 'required',
        ];
    }

    public function messages()
    {
        // Error messages for updating a user
        return [
            'id.exists' => 'Bruger ikke fundet',
            'name.required' => 'Indtast venligst et navn',
            'name.string' => 'Navnet skal være en tekst',
            'email.required' => 'Indtast venligst en email',
            'email.email' => 'Indtast venligst en gyldig email',
            'email.unique' => 'Bruger med denne email findes allerede',
            'password.required' => 'Indtast venligst et password',
            'admin.required' => 'Angiv om bruger er admin eller ej',
        ];
    }
}
