<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RemoverContrato;
use App\Services\CriadorDeContratos;
use App\Http\Requests\ContratosFormRequest;
use App\Models\{Empresa, Secretaria,Contrato};

class ContratosController extends Controller
{
    public function index(Request $request)
    {
        $contratos = Contrato::query()->orderBy('numContrato')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('contratos.index', compact('contratos', 'mensagem'));
    }

    public function create()
    {
        $empresas = Empresa::query()->orderBy('nome')->get();
        $secretarias = Secretaria::query()->orderBy('nome')->get();

        return view('contratos.create', compact('empresas', 'secretarias'));
    }

    public function store (ContratosFormRequest $request, CriadorDeContratos $criadorDeContratos)
    {
        $contrato = $criadorDeContratos->criarContrato(
            $request->numContrato,
            $request->objeto,
            $request->idEmpresa,
            $request->idSecretaria,
            $request->valor,
            $request->vencimento
        );

        $request->session()->flash(
            'mensagem', "Contrato {$contrato->numContrato} cadastrado com sucesso!"
        );

        return redirect()->route('listar_contratos');
    }

    public function destroy(Request $request, RemoverContrato $removerContrato)
    {
        $numContrato = $removerContrato->removerContrato($request->id);
        $request->session()->flash('mensagem', "O Contrato $numContrato foi removido com sucesso!");

        return redirect()->route('listar_contratos');
    }
}
