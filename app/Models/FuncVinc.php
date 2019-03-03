<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncVinc extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'func_vincs';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'ug_id',
            'func_id',
            'tipoVinculo',
            'dataAdmissao',
            'dataDemissao',
            'cargo_id',
            'userAdmissao',
            'userDemissao'
		    ];

}
