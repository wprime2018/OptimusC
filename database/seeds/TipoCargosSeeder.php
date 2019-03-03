<?php

use Illuminate\Database\Seeder;
use App\Models\FuncTipoCargo;

class TipoCargosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FuncTipoCargo::create([ 'tipoCargo' => 'Agente Político',  'tipoSal' => 1 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Estaturário',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Comissionado', 'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Celetista',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Contratado',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Reda',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Estagiario',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Menor Aprendiz',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Aposentado',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Segurado',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Cedido',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Função Gratificada Disposição',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Pensionista',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Autônomo',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Servidor Público Não Efetivo',  'tipoSal' => 2 ]);
        FuncTipoCargo::create([ 'tipoCargo' => 'Plantonista',  'tipoSal' => 3 ]);
    }
}
