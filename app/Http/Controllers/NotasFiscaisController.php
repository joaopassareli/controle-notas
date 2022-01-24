<?php

namespace App\Http\Controllers;

use App\Models\{Empenho, Contrato, Empresa, Secretaria};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CriadorDeNotasFiscais;
use App\Http\Requests\NotaFiscalFormRequest;

class NotasFiscaisController extends Controller
{
    public function index(Request $request)
    {
        // $notasFiscais = NotaFiscal::all()->sortBy('competencia');
        // $mensagem = $request->session()->get('mensagem');

        // return view('notas.index', compact('notasFiscais', 'mensagem'));
        return view('notas.index');
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

    public function destroy()
    {

    }
}
