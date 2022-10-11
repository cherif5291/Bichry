<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'description' => 'nullable|max:255|string',
            'prix_unitaire' => 'required|numeric',
            'quantite' => 'required|numeric',
            'image' => 'nullable|image|max:1024',
        ];
    }
}
