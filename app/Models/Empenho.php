<?php

namespace App\Models;

use App\Models\Contrato;
use App\Models\NotaFiscal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empenho extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['numEmpenho', 'anoEmpenho', 'emissao', 'saldo', 'idSecretaria', 'idContrato', 'idEmpresa'];

    public function contrato ()
    {
        return $this->belongsTo(Contrato::class);
    }

    public function notaFiscal ()
    {
        return $this->hasMany(NotaFiscal::class);
    }
}
