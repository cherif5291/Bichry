<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanqueUpdateRequest extends FormRequest
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
            'numero_compte' => 'required|max:255|string',
            'logo_banque' => 'nullable|max:255|string',
        ];
    }
}
