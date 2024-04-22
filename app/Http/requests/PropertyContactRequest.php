<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
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
            'firstname'=> ['required', 'string', 'min:2'], // Le champ "firstname" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 2 caractères.
            'lastname'=> ['required', 'string', 'min:2'],// Le champ "lastname" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 2 caractères.
            'phone'=> ['required', 'string', 'min:10'], // Le champ "phone" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 10 caractères.
            'email'=> ['required', 'email', 'min:4'], // Le champ "email" est requis, doit être au format d'e-mail valide et avoir une longueur minimale de 4 caractères.
            'message'=> ['required', 'string', 'min:4'],// Le champ "message" est requis, doit être une chaîne de caractères et avoir une longueur minimale de 4 caractères.
        ];
    }
}
