<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette demande.
     */
    public function authorize(): bool
    {
        return true;
    }

   /**
     * Récupère les règles de validation qui s'appliquent à la demande.
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
            'sold'=>['required','boolean'],
            'options'=>['array', 'exists:options,id', 'required'],
            'image'=>['image', 'max:2000'],
             // Ajout de la règle pour is_for_rent
        ];
    }
}
