<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactureUpdateRequest extends FormRequest
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
            'paiements_modalite_id' => 'required|exists:paiements_modalites,id',
            'factures_article_id' => 'required|exists:factures_articles,id',
            'cc_cci' => 'required|max:255|string',
            'echeance' => 'nullable|date',
            'adresse_facturation' => 'required|max:255|string',
            'numero_facture' => 'required|max:255',
            'messsage' => 'nullable|max:255|string',
            'message_affiche' => 'nullable|max:255|string',
            'has_taxe' => 'required|max:255|string',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
            'type' => 'required|max:255|string',
        ];
    }
}
