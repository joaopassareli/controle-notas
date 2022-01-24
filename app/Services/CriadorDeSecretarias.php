<?php

namespace App\Services;

use App\Models\Secretaria;
use Illuminate\Support\Facades\DB;

class CriadorDeSecretarias
{
    public function criarSecretaria (string $nomeSecretaria) : Secretaria
    {
        DB::beginTransaction();
        $secretaria = Secretaria::create(['nome' => $nomeSecretaria]);
        DB::commit();
        
        return $secretaria;
    }
}