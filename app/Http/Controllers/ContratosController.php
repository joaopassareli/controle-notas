<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use Illuminate\Http\Request;
use App\Services\RemoverContrato;
use App\Services\CriadorDeContratos;
use App\Http\Requests\ContratosFormRequest;
use App\Models\Empresa;

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
        return view('contratos.create');
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

    public function listarEmpresas (Request $request)
    {
        $empresas = Empresa::query()->orderBy('numContrato')->get();
        $request = $empresas;

        return $request;
    }
}
