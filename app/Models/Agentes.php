<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    protected $table = 'agentes';
    // Abaixo informo quais os campos da tabela podem ser preenchidas
    protected $fillable = [
            'folha_id',
            'mesRefFolha',
            'cpfAgenPublico',
            'numRgAgenPublico',
            'numPisPasepAgenPublico',
            'nomeAgenPublico',
            'numMatriculaAgenPublico',
            'nomeCargoEfetivo',
            'nivelCargoEfetivo',
            'simboloCargoEfetivo',
            'nomeCargoExterno',
            'nivelCargoExterno',
            'simboloCargoExterno',
            'cargaHorariaSemanal',
            'localTrabalho',
            'orgaoTrabalho',
            'dataIngressoOrgao',
            'tipoRegimeJuridico',
            'situacaoFuncional',
            'codigoBanco',
            'codigoAgencia',
            'numeroContBancaria',
            'qtSalarioFamilia',
            'qtDependentesIRPF',
            'valorSalarioBruto',
            'valorTotalDescontos',
            'valorSalarioLiquido',
            'valorBaseCalculoIR',
            'valorDepositoFGTS'
    ];
}
