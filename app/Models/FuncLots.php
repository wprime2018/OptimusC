<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuncLots extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $table = 'func_lots';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'ug_id',
            'depart_id',
            'nomeLotacao',
		    ];
}
