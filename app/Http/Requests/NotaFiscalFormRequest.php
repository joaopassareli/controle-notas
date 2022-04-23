<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaFiscalFormRequest extends FormRequest
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
            'numNota' => 'required',
            'emissao' => 'required',
            'valor' => 'required',
            'competencia' => 'required',
            'idEmpresa' => 'required',
            'idSecretaria' => 'required',
            'idContrato' => 'required',
            'idEmpenho' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'numNota.required' => 'O campo Nº da Nota Fiscal não pode ser vazio!',
            'emissao.required' => 'O campo Data de Emissão não pode ser vazio!'
        ];
    }
}
