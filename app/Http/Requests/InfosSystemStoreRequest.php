<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfosSystemStoreRequest extends FormRequest
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
            'nom_plateforme' => 'required|max:255|string',
            'description' => 'nullable|max:255|string',
            'website' => 'nullable|max:255|string',
            'telephone' => 'required|max:255|string',
            'portable' => 'nullable|max:255|string',
            'logo_couleur' => 'nullable|max:255|string',
            'logo_blanc' => 'nullable|max:255|string',
            'fav_icon' => 'nullable|max:255|string',
            'email_contact' => 'required|max:255|string',
            'email_support' => 'nullable|max:255|string',
        ];
    }
}
