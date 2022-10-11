<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisUpdateRequest extends FormRequest
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
            'clients_entreprise_id' => 'nullable|exists:clients_entreprises,id',
            'cc_cci' => 'nullable|max:255|string',
            'adresse_facturation' => 'required|max:255|string',
            'expiration' => 'required|date',
            'numero_devis' => 'required|max:255',
            'message_devis' => 'nullable|max:255|string',
            'message_releve' => 'nullable|max:255|string',
            'status' => 'nullable|max:255|string',
        ];
    }
}
