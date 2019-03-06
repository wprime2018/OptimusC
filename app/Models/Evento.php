<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'eventos';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'codtab',
            'codeve',
            'deseve',
            'crteve',
            'codcrt',
            'horuti',
            'rgreve',
            'rgresp',
            'tipeve',
            'nateve',
            'valcal',
            'valtet',
            'codclc',
            'tipinf',
            'dimnor',
            'gereve',
            'prieve',
            'rateve',
            'rempat'
		    ];
}
