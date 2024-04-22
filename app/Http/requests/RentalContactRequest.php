<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentalContactRequest extends FormRequest
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
            'firstname'=> ['required', 'string', 'min:2'], // Le champ "firstname" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 2 caractères.
            'lastname'=> ['required', 'string', 'min:2'],// Le champ "lastname" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 2 caractères.
            'phone'=> ['required', 'string', 'min:10'], // Le champ "phone" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 10 caractères.
            'email'=> ['required', 'email', 'min:4'], // Le champ "email" est requis, doit être au format d'e-mail valide et avoir une longueur minimale de 4 caractères.
            'message'=> ['required', 'string', 'min:4'],// Le champ "message" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 4 caractères.
        ];
    }
}
