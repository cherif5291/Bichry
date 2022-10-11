<?php

namespace Modules\Commerciale\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFactureRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fournisseur' => 'nullable',
            'date_facturation' => 'nullable',
            'echeance' => 'nullable',
            'has_taxe' => 'nullable',
            'numero_facture' => "nullable",
            'numero_cheque' => "nullable",
            'adresse_postale' => "nullable",

            'adresse_facturation' => "nullable",
            'paiements_modalite_id' => "nullable",
            'message' => "nullable",
            'message_a' => "nullable",
            'cc_cci' => "nullable",

            'paiements_mode_id' => "nullable",
            'paiements_source_id' => "nullable",
            'reference' => "nullable",
            'numero_recu' => "nullable",

            'article_id' => "nullable",
            'description' => "nullable",
            'qte' => "nullable",
            'montant' => "nullable",
            'taxe_id' => "nullable",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
