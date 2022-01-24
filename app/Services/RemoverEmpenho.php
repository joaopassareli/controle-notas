<?php

namespace App\Services;

use App\Models\Empenho;
use Illuminate\Support\Facades\DB;

class RemoverEmpenho
{
    public function removerEmpenho (int $empenhoId) : string
    {
        $numEmpenho = '';
        $anoEmpenho = '';

        DB::transaction(function () use ($empenhoId, &$numEmpenho, &$anoEmpenho){
            $empenho = Empenho::find($empenhoId);
            $numEmpenho = $empenho->numEmpenho;
            $anoEmpenho = $empenho->anoEmpenho;

            $empenho->delete();
        });

        $empenhoCompleto = $numEmpenho.'/'.$anoEmpenho;

        return $empenhoCompleto;
    }
}