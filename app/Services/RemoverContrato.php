<?php

namespace App\Services;

use App\Models\Contrato;
use Illuminate\Support\Facades\DB;

class RemoverContrato
{
    public function removerContrato (int $contratoId) : string
    {
        $numContrato = '';

        DB::transaction(function () use ($contratoId, &$numContrato) {
            $contrato = Contrato::find($contratoId);
            $numContrato = $contrato->numContrato;
            
            $contrato->delete();
        });

        return $numContrato;
    }
}