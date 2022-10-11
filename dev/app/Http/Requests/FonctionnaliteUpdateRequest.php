<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FonctionnaliteUpdateRequest extends FormRequest
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
            'module_id' => 'required|exists:modules,id',
            'nom' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'voir' => 'required|max:255|string',
            'ajouter' => 'required|max:255|string',
            'supprimer' => 'required|max:255|string',
            'modifier' => 'required|max:255|string',
            'exporter' => 'required|max:255|string',
        ];
    }
}
