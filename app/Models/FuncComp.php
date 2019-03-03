<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncComp extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'func_comp';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'func_id',
            'numPis',
            'dataNasc',
            'numRg',
            'orgaoRg',
            'ufRg',
            'dtExpRg',
            'tipSex',
            'tipCon',
            'estCivil',
            'numTitulo',
            'numZonaTit',
            'numSecaoTit',
            'numCnh',
            'catCnh',
            'datCnh',
            'venCnh',
            'nomMae',
            'nomPai',
            'dtDevCTPS',
            'dtExpCTPS',
            'numCTPS',
            'serCTPS',
            'estCTPS'
		    ];
}
