<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lancamento extends Model
{
    protected $table = 'lancamentos';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'agente_id',
            'tipoRendDesc',
            'valorRendDesc',
            'nomeRendDesc',
    ];
}
