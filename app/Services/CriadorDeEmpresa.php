<?php

namespace App\Services;

use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class CriadorDeEmpresa
{
    public function criarEmpresa (string $nomeEmpresa) : Empresa
    {
        DB::beginTransaction();
        $empresa = Empresa::create(['nome' => $nomeEmpresa]);
        DB::commit();
        
        return $empresa;
    }
}

