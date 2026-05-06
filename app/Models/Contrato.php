<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = ['cliente_id','imovel_id','data_inicio','data_fim'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function imovel()
    {
        return $this->belongsTo(Imovel::class);
    }
}
