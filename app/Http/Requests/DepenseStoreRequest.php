<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepenseStoreRequest extends FormRequest
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
            'client_id' => 'required|exists:entreprises,id',
            'paiements_mode_id' => 'required|exists:paiements_modes,id',
            'reference' => 'required|max:255',
            'note' => 'required|max:255|string',
            'source' => 'required|max:255|string',
        ];
    }
}
