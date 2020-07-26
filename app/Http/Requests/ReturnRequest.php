<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReturnRequest extends FormRequest
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
        $rules = [
            'refno' => 'required',
        ];

        $returns = 0;

        foreach($this->request->get('item') as $key => $val)
        {
            $max = $val['quantity'];
            $returns += $val['return'];

            $rules['item.'.$key.'.receive'] = 'required|numeric|min:1|max:'.$max;

        }

        $this->request->set('returned',$returns);

        return $rules;
    }
//    public function messages()
//    {
//        $messages = [];
//        foreach($this->request->get('item') as $key => $val)
//        {
//            $messages['item.'.$key.'.receive.'.'.min'] = 'The field labeled "Book Title '.$key.'" must be greater than :min characters.';
//        }
//        return $messages;
//    }
}
