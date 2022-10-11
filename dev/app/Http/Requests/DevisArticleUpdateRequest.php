<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisArticleUpdateRequest extends FormRequest
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
            'devis_id' => 'required|exists:devis,id',
            'taxe_id' => 'required|exists:taxes,id',
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
        ];
    }
}
