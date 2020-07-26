<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartRequest extends FormRequest
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
            'quantity' => 'sometimes|numeric|between:1,' . $this->get('qt', 1),
        ];
    }

    public function messages()
    {
        return [
            'quantity.between' => 'The product quantity provided is invalid'
        ];
    }
}
