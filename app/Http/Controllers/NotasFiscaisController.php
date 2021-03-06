<?php

namespace App\Http\Controllers;

use App\Models\NotaFiscal;
use Illuminate\Http\Request;
use App\Services\RemoverNota;
use App\Http\Controllers\Controller;
use App\Services\CriadorDeNotasFiscais;
use App\Http\Requests\NotaFiscalFormRequest;
use App\Models\{Empenho, Contrato, Empresa, Secretaria};

class NotasFiscaisController extends Controller
{
    public function index(Request $request)
    {
        $notas = NotaFiscal::all()->sortBy('competencia');
        $mensagem = $request->session()->get('mensagem');

        return view('notas.index', compact('notas', 'mensagem'));
    }

    public function create ()
    {
        $empresas = Empresa::query()->orderBy('nome')->get();
        $secretarias = Secretaria::query()->orderBy('nome')->get();
        $contratos = Contrato::query()->orderBy('numContrato')->get();
        $empenhos = Empenho::query()->orderBy('numEmpenho')->get();

        return view('notas.create', compact('empresas', 'secretarias', 'contratos', 'empenhos'));
    }

    public function store(NotaFiscalFormRequest $request, CriadorDeNotasFiscais $criadorDeNotasFiscais)
    {
        $notaFiscal = $criadorDeNotasFiscais->criarNotasFiscais(
            $request->numNota,
            $request->emissao,
            $request->valor,
            $request->competencia,
            $request->idEmpresa,
            $request->idSecretaria,
            $request->idContrato,
            $request->idEmpenho
        );

        $request->session()->flash(
            'mensagem', "Nota Fiscal nº {$notaFiscal->numNota} cadastrado com sucesso!"
        );

        return redirect()->route('listar_notas');
    }

    public function destroy(Request $request, RemoverNota $removerNota)
    {
        $numNota = $removerNota->removerNota($request->id);
        $request->session()->flash('mensagem', "A Nota Fiscal nº $numNota foi removido com sucesso!");

        return redirect()->route('listar_notas');
    }
}
