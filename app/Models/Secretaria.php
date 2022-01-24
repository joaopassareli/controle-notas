<?php

namespace App\Models;

use App\Models\Contrato;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Secretaria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nome'];

    public function secretarias()
    {
        return $this->hasMany(Contrato::class);
    }
}
