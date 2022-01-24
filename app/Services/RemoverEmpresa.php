<?php

namespace App\Services;

use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class RemoverEmpresa
{
    public function removerEmpresa (int $empresaId) : string
    {
        $nomeEmpresa = '';

        DB::transaction(function () use ($empresaId, &$nomeEmpresa) {
            $empresa = Empresa::find($empresaId);
            $nomeEmpresa = $empresa->nome;
            
            $empresa->delete();
        });

        return $nomeEmpresa;
    }
}