<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRewardRequest extends FormRequest
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
        // Validation rules for updating a reward
        return [
            'id' => 'exists:App\Models\Reward,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'sometimes|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048'
        ];
    }

    public function messages()
    {
        // Error messages for updating a reward
        return [
            'id.exists' => 'Reward ikke fundet',
            'name.required' => 'Indtast venligst navn på reward',
            'name.string' => 'Navn på reward skal være en tekst',
            'description.required' => 'Indtast venligst beskrivelse af reward',
            'description.string' => 'Beskrivelse af reward skal være en tekst',
            'price.required' => 'Indtast venligst pris',
            'price.numeric' => 'Pris skal være et tal',
            'image.sometimes' => 'Upload venligst et billede',
            'image.image' => 'Billedet skal være af typen jpg, jpeg, png, bmp, gif, svg, eller webp',
            'image.max' => 'Billedet skal være 2MB eller mindre',
        ];
    }
}
