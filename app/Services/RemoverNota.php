<?php

namespace App\Services;

use App\Models\NotaFiscal;
use Illuminate\Support\Facades\DB;

class RemoverNota
{
    public function removerNota (int $notaId) : string
    {
        $numNota = '';

        DB::transaction(function () use ($notaId, &$numNota) {
            $notaFiscal = NotaFiscal::find($notaId);
            $numNota = $notaFiscal->numNota;
            
            $notaFiscal->delete();
        });

        return $numNota;
    }
}