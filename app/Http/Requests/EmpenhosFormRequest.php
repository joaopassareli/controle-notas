<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpenhosFormRequest extends FormRequest
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
            'numEmpenho' => 'required',
            'anoEmpenho' => 'required',
            'emissao' => 'required',
            'saldo' => 'required',
            'idEmpresa' => 'required',
            'idSecretaria' => 'required',
            'idContrato' => 'required'
        ];
    }

    public function messages ()
    {
        return[
            'numEmpenho.required' => 'O campo Número do Empenho não pode ser vazio!',
            'anoEmpenho.required' => 'O campo Ano do Empenho não pode ser vazio!',
            'emissao.required' => 'O campo Data de Emissão não pode ser vazio!',
            'saldo.required' => 'O campo Saldo não pode ser vazio!',
            'idEmpresa.required' => 'O campo Empresa não pode ser vazio!',
            'idSecretaria.required' => 'O campo Secretaria não pode ser vazio!',
            'idContrato.required' => 'O campo Contrato não pode ser vazio!'
        ];
    }
}
