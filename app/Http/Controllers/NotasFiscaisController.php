<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotaFiscalFormRequest;
use App\Models\NotaFiscal;
use App\Services\CriadorDeNotasFiscais;

class NotasFiscaisController extends Controller
{
    public function index(Request $request)
    {
        $notasFiscais = NotaFiscal::all()->sortBy('competencia');
        $mensagem = $request->session()->get('mensagem');

        return view('notas.index', compact('notasFiscais', 'mensagem'));
        return view('notas.index');
    }

    public function create ()
    {
        return view('notas.create');
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
