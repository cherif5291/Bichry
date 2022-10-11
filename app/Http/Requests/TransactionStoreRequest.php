<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
            'banque_id' => 'required|exists:banques,id',
            'caisse_id' => 'required|exists:caisses,id',
            'motif' => 'required|max:255|string',
            'montant' => 'required|numeric',
            'pre_solde_banque' => 'required|numeric',
            'post_solde_banque' => 'required|numeric',
            'pre_solde_caisse' => 'required|numeric',
            'post_solde_caisse' => 'required|numeric',
            'type' => 'required|max:255|string',
        ];
    }
}
