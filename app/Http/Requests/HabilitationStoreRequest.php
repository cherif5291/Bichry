<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HabilitationStoreRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'habilitation' => 'required|max:255|string',
            'module_id' => 'required|exists:modules,id',
            'fonctionnalite_id' => 'required|exists:fonctionnalites,id',
        ];
    }
}
