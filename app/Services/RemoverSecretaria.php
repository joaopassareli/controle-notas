<?php

namespace App\Services;

use App\Models\Secretaria;
use Illuminate\Support\Facades\DB;

class RemoverSecretaria
{
    public function removerSecretaria (int $secretariaId) : string
    {
        $nomeSecretaria = '';

        DB::transaction(
            function () use ($secretariaId, &$nomeSecretaria) {
                $secretaria = Secretaria::find($secretariaId);
                $nomeSecretaria = $secretaria->nome;
                
                $secretaria->delete();
            }
        );

        return $nomeSecretaria;
    }
}