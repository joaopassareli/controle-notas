<?php

namespace App\Http\Controllers;

use App\Models\Empenho;
use Illuminate\Http\Request;
use App\Services\RemoverEmpenho;
use App\Services\CriadorDeEmpenhos;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpenhosFormRequest;

class EmpenhosController extends Controller
{
    public function index(Request $request)
    {
        $empenhos = Empenho::all()->sortBy('emissao');
        $mensagem = $request->session()->get('mensagem');

        return view('empenhos.index', compact('empenhos', 'mensagem'));
    }

    public function create()
    {
        return view('empenhos.create');
    }

    public function store(EmpenhosFormRequest $request, CriadorDeEmpenhos $criadorDeEmpenhos)
    {
        $empenho = $criadorDeEmpenhos->criarEmpenho(
            $request->numEmpenho, $request->anoEmpenho, $request->emissao, $request->saldo,
            $request->idEmpresa, $request->idSecretaria, $request->idContrato
        );

        $request->session()->flash(
            'mensagem', "O empenho {$empenho->numEmpenho}/{$empenho->anoEmpenho} foi cadastrado com sucesso!"
        );

        return redirect()->route('listar_empenhos');
    }

    public function destroy (Request $request, RemoverEmpenho $removerEmpenho)
    {
        $numEmpenho = $removerEmpenho->removerEmpenho($request->id);
        $request->session()->flash('mensagem', "Empenho $numEmpenho removido com sucesso!");

        return redirect()->route('listar_empenhos');
    }
}
