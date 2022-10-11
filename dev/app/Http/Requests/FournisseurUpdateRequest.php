<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurUpdateRequest extends FormRequest
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
            'entreprise_id' => 'required|exists:entreprises,id',
            'prenom' => 'required|max:255|string',
            'nom' => 'required|max:255|string',
            'entreprise' => 'required|max:255|string',

            'email' => 'required|email',
            'telephone' => 'required|max:255|string',

            'titre' => 'nullable|max:255|string',
            'adresse' => 'required|max:255|string',
            'ville' => 'required|max:255|string',
            'province' => 'nullable|max:255|string',
            'code_postal' => 'nullable|max:255|string',
            'pays' => 'required|max:255|string',
            'note' => 'nullable|max:255|string',
            'paiements_modalite_id' => 'nullable|exists:paiements_modalites,id',
            'numero_compte' => 'nullable|max:255|string',
            'comptescomptable_id' => 'nullable|exists:comptescomptables,id',
            'solde_ouverture' => 'nullable|numeric',
            'date_ouverture' => 'nullable|date',
            'devises_monetaire_id' => 'required|exists:devises_monetaires,id',
        ];
    }
}
