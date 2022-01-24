<?php

namespace App\Models;

use App\Models\Empenho;
use App\Models\NotaFiscal;
use App\Models\Secretaria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrato extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['numContrato', 'objeto', 'idEmpresa', 'idSecretaria', 'valor', 'vencimento'];
    
    
    public function secretaria ()
    {
        return $this->belongsTo(Secretaria::class);
    }

    public function empenho ()
    {
        return $this->hasMany(Empenho::class);        
    }

    public function notaFiscal ()
    {
        return $this->hasMany(NotaFiscal::class);
    }
}