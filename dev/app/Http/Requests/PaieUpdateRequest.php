<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaieUpdateRequest extends FormRequest
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
            'employes_entreprise_id' =>
                'required|exists:employes_entreprises,id',
            'date' => 'nullable|date',
            'montant_paye' => 'required|numeric',
            'restant' => 'nullable|numeric',
        ];
    }
}
