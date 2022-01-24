<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratosFormRequest extends FormRequest
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
            // 'numContrato' => 'required|min:6',
            'objeto' => 'required|min:10',
            'valor' => 'required',
            'vencimento' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'numContrato.required' => 'O campo "Número do Contrato" não pode ser vazio.',
            // 'numContrato.min' => 'O campo "Número do Contrato" deverá possuir ao menos 06 caracteres',
            'objeto.required' => 'O campo Objeto não pode ser vazio.',
            'objeto.min' => 'O campo Objeto deverá possuir ao menos 10 caracteres',
            'valor.required' => 'O campo Valor do Contrato não pode ser vazio.',
            'vencimento.required' => 'O campo Vencimento do Contrato não pode ser vazio.'
        ];
    }
}
