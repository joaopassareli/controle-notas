<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasFormRequest extends FormRequest
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
            'nome' => 'required|min:3|max:255'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo "Nome da Empresa" não pode ser vazio.',
            'nome.min' => 'O campo "Nome da Empresa" deverá possuir ao menos 3 caracteres',
            'nome.max' => 'O campo "Nome da Empresa" não pode conter mais que 255 caracteres.'
        ];
    }
}
