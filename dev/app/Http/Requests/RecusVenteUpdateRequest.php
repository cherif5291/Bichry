<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecusVenteUpdateRequest extends FormRequest
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
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_livraison' => 'required|max:255|string',
            'date_recu_vente' => 'required|date',
            'reference' => 'required|max:255',
            'numero_recu' => 'required|max:255',
            'article_id' => 'required|exists:articles,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'message_recu' => 'required|max:255|string',
            'message_releve' => 'required|max:255|string',
            'depose_sur' => 'required|max:255|string',
            'caisse_id' => 'nullable|exists:caisses,id',
            'banque_id' => 'nullable|exists:banques,id',
            'montant' => 'required|numeric',
        ];
    }
}
