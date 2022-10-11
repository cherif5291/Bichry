<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuptureUpdateRequest extends FormRequest
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
            'invitation_id' => 'required|exists:invitations,id',
            'entreprise_id' => 'required|exists:entreprises,id',
            'status' => 'nullable|max:255|string',
        ];
    }
}
