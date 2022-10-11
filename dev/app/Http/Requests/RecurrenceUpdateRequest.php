<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecurrenceUpdateRequest extends FormRequest
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
            'facture_id' => 'nullable|exists:factures,id',
            'paie_id' => 'nullable|exists:paies,id',
            'interval_jour' => 'required|numeric',
            'prochain_date' => 'required|date',
            'regle_id' => 'required|exists:regles,id',
        ];
    }
}
