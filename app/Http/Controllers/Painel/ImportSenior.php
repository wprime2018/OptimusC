<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\UGestora;
use App\Models\Folha;
use App\Models\Agentes;
use App\Models\Lancamento;
use App\Models\Funcionarios;
use App\Models\FuncLots;
use App\Models\FuncCargos;
use App\Models\FuncComp;
use App\Models\FuncDadosBanc;
use App\Models\FuncDeparts;
use App\Models\FuncDepend;
use App\Models\FuncTipoCargo;
use App\Models\FuncVinc;
use Carbon\Carbon;
use DB;
use Auth;

class ImportSenior extends Controller
{
    public function importFunc(Request $request) {
        
        if($request->file('file2'))
        {
            importCargos($request);
        }
        if($request->file('file1'))
        {
            $path = $request->file('file1')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            $dataImport[] = [
                'path_file' => $path
            ];
    
            if(!empty($data) && $data->count())
            {
                
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        // Começando os testes dos dados para ajustar ao DB Atual
                        
                        switch ($row['numemp']) {
                            case '1':
                                $ug_id = 2;
                                break;
                            case '2':
                                $ug_id = 3;
                                break;
                            case '3':
                                $ug_id = 1;
                                break;
                        }
                        $dataAtual = Carbon::now();
                        //table 'funcionarios'
                        $dataArrayFunc = [
                            'ug_id' => $ug_id,
                            'matricula' => $row['numcad'],
                            'nome' => $row['nomfun'],
                            'apelido' => $row['apefun'],
                            'cpf' => str_pad($row['numcpf'], 11, "0", STR_PAD_LEFT),
                        ];
                        
                        
                        $idFunc = Funcionarios::where('cpf' ,$dataArrayFunc['cpf'])->get();

                        $countFunc = count($idFunc);

                        if($countFunc > 0)
                        {
                            foreach ($idFunc as $id => $value) {
                                $idFunc = $value;
                            }

                            $idVinc = FuncVinc::where('ug_id',$ug_id)
                                                ->where('func_id',$idFunc)
                                                ->orderby('dataAdmissao')
                                                ->max('dataAdmissao')
                                                ->get('id','dataAdmissao');
                            if (($idVinc->id > 0) && ($idVinc->dataAdmissao != $row['datadm']))   
                            {
                                //Find Vinc but dataAdmissao not equal
                                
                                $dataArrayFuncVinc = [
                                    'ug_id' => $ug_id,
                                    'func_id' => $idFunc->id,
                                    'tipoVinculo' => $row['tipadm'],
                                    'dataAdmissao' => $row['datadm'],
                                    'cargo_id' => $row['codcar'],
                                    'userAdmissao' => Auth::user()->id
                                ];

                                $createFuncVinc = FuncVinc::create($dataArrayFuncVinc);
                            }
                        } 
                        else 
                        {
                            $createFunc = Funcionarios::create($dataArrayFunc);
                            $func_id = $createFunc->id;

                            $dataArrayFuncVinc = [
                                'ug_id' => $ug_id,
                                'func_id' => $func_id,
                                'tipoVinculo' => $row['tipadm'],
                                'dataAdmissao' => $row['datadm'],
                                'cargo_id' => $row['codcar'],
                                'userAdmissao' => Auth::user()->id
                            ];
                            $createFuncVinc = FuncVinc::create($dataArrayFuncVinc);
                        }   

                        $dataArrayFuncComp =
                        [
                            'func_id' => $func_id,
                            'dataNasc' => $row['datnas'],
                            'numPis' => $row['numpis'],
                            'tipSex' => $row['tipsex'],
                            'tipcon' => $row['tipcon'],
                            'estCivil' => $row['estciv'],
                            'numCTPS' => $row['numctp'],
                            'serCTPS' => $row['serctp'],
                            'estCTPS' => $row['estctp'],
                            'dtExpCTPS' => $row['dexctp'],
                        ];

                        $createFuncComp = FuncComp::create($dataArrayFuncComp);

                        $dataArrayFuncDadosBanc =
                        [
                            'func_id' => $func_id,
                            'codBanco' => $row['codban'],
                            'codAg' => $row['codage'],
                            'numContBan' => $row['conban'],
                            'dvContBan' => $row['digban'],
                            'tipoConta' => 0,
                        ];
                        $createFuncDadosBanc = FuncDadosBanc::create($dataArrayFuncDadosBanc);
                    }
                }
                return back();
            }
        }
    }

    public function importCargos(Request $request) {
        
        if($request->file('file2'))
        {
            $path = $request->file('file2')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            $dataImport[] = [
                'path_file' => $path
            ];
    
            if(!empty($data) && $data->count())
            {
                
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        // Começando os testes dos dados para ajustar ao DB Atual
                        
                        switch ($row['numemp']) {
                            case '1':
                                $ug_id = 2;
                                break;
                            case '2':
                                $ug_id = 3;
                                break;
                            case '3':
                                $ug_id = 1;
                                break;
                        }
                        //table 'funcionarios'
                        $ArrayCargos = [
                            'ug_id' => $ug_id,
                            'tipoCargo_id' => 2,
                            'codCBO' => $row['codcbo'],
                            'nomeCargo' => $row['titred'],
                            'nivelCargo' => 'I',
                            'simboloCargo' => 'CC-6',
                            'cargaHorariaSemanal' => 40,
                            'valorSalario' => 998.00
                        ];
                        $createFuncCargo = FuncCargos::create($ArrayCargos);
                    }
                }
                return back();
            }
        }
    }
}