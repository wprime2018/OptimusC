<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Folha extends Model
{
    protected $table = 'folhas';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'mesRefFolha',
            'anoRefFolha',
            'tipoFolha',
            'seqTipoFolha'
		    ];

}
