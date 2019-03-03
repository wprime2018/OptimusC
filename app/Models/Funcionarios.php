<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Funcionarios extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'funcionarios';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'ug_id',
            'cpf',
            'nome',
            'apelido',
            'matricula',
            'tipoRegimeJuridico',
            'situacaoFuncional',
            'qtSalarioFamilia',
            'qtDependentesIRPF'
		    ];
}
