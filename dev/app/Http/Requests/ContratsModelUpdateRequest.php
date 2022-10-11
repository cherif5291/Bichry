<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratsModelUpdateRequest extends FormRequest
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
            'contrats_type_id' => 'required|exists:contrats_types,id',
            'entreprise_id' => 'required|exists:entreprises,id',
        ];
    }
}
