<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'          => 'required',
            'description'   => 'nullable|min:5|max:25',
            'phone'         => 'required|numeric',
            'mobile_phone'  => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Campo deve ter no minimo :min caracateres',
            'max' => 'Campo dever ter no máximo :max caracteres',
            'required' => 'Este campo é obrigatório',
            'numeric' => 'Este campo deve conter um número de telefone válido'
        ];
    }
}
