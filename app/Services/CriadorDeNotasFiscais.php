<?php

namespace App\Services;

use App\Models\NotaFiscal;
use Illuminate\Support\Facades\DB;


class CriadorDeNotasFiscais
{
    public function criarNotasFiscais(string $numNota, string $emissao, float $valor,
     string $competencia, string $idEmpresa, string $idSecretaria, string $idContrato, string $idEmpenho) : NotaFiscal
    {
        DB::beginTransaction();
        $notaFiscal = NotaFiscal::create([
                'numNota' => $numNota,
                'emissao' => $emissao,
                'valor' => $valor,
                'competencia' => $competencia,
                'idEmpresa' => $idEmpresa,
                'idSecretaria' => $idSecretaria,
                'idContrato' => $idContrato,
                'idEmpenho' => $idEmpenho
        ]);
        DB::commit();

        return $notaFiscal;
    }
}