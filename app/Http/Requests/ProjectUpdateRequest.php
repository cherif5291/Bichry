<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'clients_entreprise_id' => 'required|exists:clients_entreprises,id',
            'nom' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'cout' => 'required|numeric',
            'dead_line' => 'required|date',
        ];
    }
}
