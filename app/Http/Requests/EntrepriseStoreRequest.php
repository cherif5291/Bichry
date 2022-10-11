<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntrepriseStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'nom_entreprise' => 'required|max:255|string',
            'a_propos' => 'required|max:255|string',
            'email' => 'required|email',
            'telephone' => 'required|max:255|string',
            'portable' => 'required|max:255|string',
            'adresse' => 'required|max:255|string',
            'capital' => 'nullable|numeric',
            'logo' => 'nullable|max:255|string',
            'modeles_devis_id' => 'required|exists:modeles_devis,id',
            'modeles_facture_id' => 'required|exists:modeles_factures,id',
            'modeles_recu_id' => 'required|exists:modeles_recus,id',
            'devises_monetaire_id' => 'required|exists:devises_monetaires,id',
            'couleur_primaire' => 'nullable|max:255|string',
            'couleur_secondaire' => 'nullable|max:255|string',
        ];
    }
}
