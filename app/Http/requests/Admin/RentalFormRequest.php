<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RentalFormRequest extends FormRequest
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
            'title'=>['required','min:8'],
            'description'=>['required','min:8'],
            'surface'=>['required','integer','min:20'],
            'rooms'=>['required','integer','min:1'],
            'bedrooms'=>['required','integer','min:1'],
            'floor'=>['required','integer','min:0'],
            'city'=>['required','min:4'],
            'price'=>['required','integer','min:0'],
            'address'=>['required','string','min:8'],
            'postal_code'=>['required','integer','min:3'],
            'rented'=>['required','boolean'],
            'features'=>['array', 'exists:features,id', 'required'],
            'image'=>['image', 'max:2000'],
        ];
    }
}
