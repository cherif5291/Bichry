<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisesMonetaireUpdateRequest extends FormRequest
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
            'nom' => 'required|max:255|string',
            'sigle' => 'required|max:255|string',
            'taux_echange' => 'required|numeric',
        ];
    }
}
