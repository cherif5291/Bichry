<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReglementStoreRequest extends FormRequest
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
            'facture_id' => 'nullable|exists:factures,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'nullable|max:255|string',
            'cc_cci' => 'nullable|max:255|string',
            'approvisionnememnt' => 'required|max:255|string',
            'banque_id' => 'nullable|exists:banques,id',
            'caisse_id' => 'nullable|exists:caisses,id',
            'montant_recu' => 'required|numeric',
            'note' => 'nullable|max:255|string',
        ];
    }
}
