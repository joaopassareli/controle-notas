<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Services\RemoverEmpresa;
use App\Services\CriadorDeEmpresa;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresasFormRequest;

class EmpresasController extends Controller
{
    public function index(Request $request)
    {
        $empresas = Empresa::all()->sortBy('nome');
        $mensagem = $request->session()->get('mensagem');
        
        return view('empresas.index', compact('empresas', 'mensagem'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store (EmpresasFormRequest $request, CriadorDeEmpresa $criadorDeEmpresa)
    {
        $empresa = $criadorDeEmpresa
            ->criarEmpresa($request->nome);

        $request->session()->flash(
            'mensagem', "Empresa {$empresa->nome} cadastrada com sucesso!"
        );

        return redirect()->route('listar_empresas');
    }

    public function destroy (Request $request, RemoverEmpresa $removerEmpresa)
    {
        $nomeEmpresa = $removerEmpresa->removerEmpresa($request->id);

        $request->session()->flash(
            'mensagem', "Empresa $nomeEmpresa removida com sucesso!"
        );

        return redirect()->route('listar_empresas');
    }

    public function editaNome (int $id, Request $request)
    {
        $novoNome = $request->nome;
        $empresa = Empresa::find($id);
        $empresa->nome = $novoNome;
        $empresa->save();
    }
}
