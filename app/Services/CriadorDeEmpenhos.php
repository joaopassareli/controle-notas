<?php

namespace App\Services;

use App\Models\Empenho;
use Illuminate\Support\Facades\DB;

class CriadorDeEmpenhos{

    public function criarEmpenho(string $numEmpenho, string $anoEmpenho, string $emissao, float $saldo, string $idEmpresa, string $idSecretaria, string $idContrato) : Empenho
    {
        DB::beginTransaction();
        $empenho = Empenho::create(
            [
                'numEmpenho' => $numEmpenho,
                'anoEmpenho' =>$anoEmpenho,
                'emissao' =>$emissao,
                'saldo' => $saldo,
                'idEmpresa' => $idEmpresa,
                'idSecretaria' => $idSecretaria,
                'idContrato' => $idContrato
            ]
        );
        DB::commit();

        return $empenho;
    }
}
