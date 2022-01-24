<?php

namespace App\Services;

use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

class CriadorDeContratos{

    public function criarContrato(string $numContrato, string $objeto, string $empresa, string $secretaria, float $valor, string $data) : Contrato
    {
        DB::beginTransaction();
        $contrato = Contrato::create(
            [
                'numContrato' => $numContrato,
                'objeto' => $objeto,
                'idEmpresa' => $empresa,
                'idSecretaria' => $secretaria,
                'valor' => $valor,
                'vencimento' => $data
            ]
        );
        DB::commit();

        return $contrato;
    }
}
