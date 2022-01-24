<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CriadorDeSecretarias;
use App\Http\Requests\SecretariasFormRequest;
use App\Services\RemoverSecretaria;

class SecretariasController extends Controller
{
    public function index(Request $request)
    {
        $secretarias = Secretaria::all()->sortBy('nome');
        $mensagem = $request->session()->get('mensagem');
        
        return view('secretarias.index', compact('secretarias', 'mensagem'));
    }

    public function create()
    {
        return view('secretarias.create');
    }

    public function store (SecretariasFormRequest $request, CriadorDeSecretarias $criador)
    {
        $secretaria = $criador->criarSecretaria($request->nome);
        var_dump($request->nome);
        $request->session()->flash('mensagem', "Secretaria {$secretaria->nome} cadastrada com sucesso!");

        return redirect()->route('listar_secretarias');
    }

    public function destroy (Request $request, RemoverSecretaria $removerSecretaria)
    {
        $nomeSecretaria = $removerSecretaria->removerSecretaria($request->id);
        $request->session()->flash('mensagem', "Secretaria $nomeSecretaria removida com sucesso!");

        return redirect()->route('listar_secretarias');
    }

    public function editaNome (int $id, Request $request)
    {
        $novoNome = $request->nome;
        $empresa = Secretaria::find($id);
        $empresa->nome = $novoNome;
        $empresa->save();
    }
}