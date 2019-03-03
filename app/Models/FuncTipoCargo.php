<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncTipoCargo extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'func_tipo_cargos';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'tipoCargo',
            'tipoSal',
		    ];
}
