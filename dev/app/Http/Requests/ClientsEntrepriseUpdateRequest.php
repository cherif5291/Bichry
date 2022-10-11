<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientsEntrepriseUpdateRequest extends FormRequest
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
            'nom' => 'required|max:255|string',
            'prenom' => 'required|max:255|string',
            'entreprise' => 'required|max:255|string',
            'email' => 'nullable|email',
            'telephone' => 'required|max:255|string',

            'titre' => 'nullable|max:255|string',

            'adresse' => 'required|max:255|string',
            'ville' => 'required|max:255|string',
            'province' => 'nullable|max:255|string',
            'code_postale' => 'nullable|max:255|string',
            'pays' => 'required|max:255|string',
            'note' => 'nullable|max:255|string',
            'paiements_mode_id' => 'nullable|exists:paiements_modes,id',
            'paiements_modalite_id' => 'nullable|exists:paiements_modalites,id',
            'devises_monetaire_id' => 'nullable|exists:devises_monetaires,id',
            'logo' => 'nullable|max:255|string',
        ];
    }
}
