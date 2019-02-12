<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UGestora extends Model
{
    protected $table = 'un_gestora';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'codigoUnidGestora',
            'nomeUnidGestora',
            'cpfContador',
            'cpfGestor',
    ];    //
}
