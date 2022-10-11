<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployesEntrepriseStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'prenom' => 'required|max:255|string',
            'nom' => 'required|max:255|string',
            'initial' => 'required|max:255|string',
            'email' => 'required|email',
            'telephone' => 'required|max:255|string',
            'data_embauche' => 'required|date',
            'interval_paiement' => 'required|max:255|string',
            'duree_interval' => 'required|numeric',
            'remuneration' => 'required|numeric',
        ];
    }
}
