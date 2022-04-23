<?php

namespace App\Models;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NotaFiscal extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'notas_fiscais';
    
    protected $fillable = ['numNota', 'emissao', 'valor', 'competencia', 'idEmpresa', 'idSecretaria', 'idContrato', 'idEmpenho'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
