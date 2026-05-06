<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    protected $fillable = ['titulo','endereco','cidade','valor','status','tipo_imovel_id'];

    public function tipo()
    {
        return $this->belongsTo(TipoImovel::class, 'tipo_imovel_id');
    }
}


