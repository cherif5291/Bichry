<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratStoreRequest extends FormRequest
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
            'status' => 'required|max:255|string',
            'signature1' => 'nullable|max:255|string',
            'signature2' => 'nullable|max:255|string',
            'entreprise_id' => 'required|exists:entreprises,id',
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'employes_entreprise_id' =>
                'required|exists:employes_entreprises,id',
            'facture_id' => 'required|exists:factures,id',
            'project_id' => 'required|exists:projects,id',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ];
    }
}
