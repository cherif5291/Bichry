<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PresenceStoreRequest extends FormRequest
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
            'date' => 'required|date',
            'heure_arrive' => 'nullable|date_format:H:i:s',
            'heure_depard' => 'nullable|date_format:H:i:s',
            'temps_absence' => 'nullable|numeric',
            'est_present' => 'required|max:255|string',
        ];
    }
}
