<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FacturesArticleUpdateRequest extends FormRequest
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
            'article_id' => 'required|exists:articles,id',
            'qte' => 'required|numeric',
            'taux' => 'required|numeric',
            'total' => 'required|numeric',
            'taxe_id' => 'required|exists:taxes,id',
        ];
    }
}
