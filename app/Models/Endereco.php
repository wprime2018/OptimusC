<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'enderecos';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'origemEnd',
            'tipoEnd',
            'cep',
            'logradouro',
            'numero',
            'compl',
            'bairro',
            'city_id',
            'country'
		    ];
}
