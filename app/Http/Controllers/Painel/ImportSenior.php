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
use App\Models\Evento;
use App\Models\Calendario;
use App\Models\Verba;
use Carbon\Carbon;
use DB;
use Auth;

class ImportSenior extends Controller
{
    public function importFunc(Request $request) {
        
        if($request->file('file3'))
        {
            importSenior::importVerbas($request);
        }
        if($request->file('file2'))
        {
            importSenior::importEventos($request);
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
                                $idFunc = $value->id;
                            }
                            
                            $idVinc = FuncVinc::where('ug_id',$ug_id)->where('func_id',$idFunc)->orderby('dataAdmissao', 'desc')->limit(1)->get();
                            
                            foreach ($idVinc as $id => $value) { $idVin = $value->id; $dataAdmissao = $value->dataAdmissao;}

                            try {
                                $dataAdmSenior = $row['datadm'];
                                if (($idVin > 0) && ($dataAdmissao != $dataAdmSenior)) {
                                    //Find Vinc but dataAdmissao not equal
                                    
                                    $idCargo = FuncCargos::where('codCargo',$row['codcar'])->get();
                                    if (count($idCargo)>0) {
                                        foreach ($idCargo as $key => $value) { $idCargo = $value->id; }
                                    }
    
                                    $dataArrayFuncVinc = [
                                        'ug_id' => $ug_id,
                                        'func_id' => $idFunc,
                                        'tipoVinculo' => $row['tipadm'],
                                        'matricula' => $row['numcad'],
                                        'dataAdmissao' => $row['datadm'],
                                        'cargo_id' => $idCargo,
                                        'userAdmissao' => Auth::user()->id
                                    ];
    
                                    $createFuncVinc = FuncVinc::create($dataArrayFuncVinc);
                                }

                            } catch (\Throwable $th) {
                                dd(compact('idVin', 'dataAdmissao','dataAdmSenior'));
                            }
                        } 
                        else 
                        {
                            $createFunc = Funcionarios::create($dataArrayFunc);
                            
                            $func_id = $createFunc->id;
                            
                            $idCargo = FuncCargos::where('codCargo',$row['codcar'])->get();
                            
                            if (count($idCargo)>0) { 
                                foreach ($idCargo as $key => $value) { $idCargo = $value->id; }
                            }

                            $dataArrayFuncVinc = [
                                'ug_id' => $ug_id,
                                'func_id' => $func_id,
                                'tipoVinculo' => $row['tipadm'],
                                'matricula' => $row['numcad'],
                                'dataAdmissao' => $row['datadm'],
                                'cargo_id' => $idCargo,
                                'userAdmissao' => Auth::user()->id
                            ];
                            $createFuncVinc = FuncVinc::create($dataArrayFuncVinc);

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
                }
                return back();
            }
        }
    }
    public function importEventos(Request $request) 
    {
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
                        
                        $dataArrayEvento = [
                            'codtab' => $row['codtab'],
                            'codeve' => $row['codeve'],
                            'deseve' => $row['deseve'],
                            'crteve' => $row['crteve'],
                            'codcrt' => $row['codcrt'],
                            'horuti' => $row['horuti'],
                            'rgreve' => $row['rgreve'],
                            'rgresp' => $row['rgresp'],
                            'tipeve' => $row['tipeve'],
                            'nateve' => $row['nateve'],
                            'valcal' => $row['valcal'],
                            'valtet' => $row['valtet'],
                            'codclc' => $row['codclc'],
                            'tipinf' => $row['tipinf'],
                            'dimnor' => $row['dimnor'],
                            'gereve' => $row['gereve'],
                            'prjeve' => $row['prjeve'],
                            'rateve' => $row['rateve'],
                            'rempat' => $row['rempat']
                        ];
                        $createEvento = Evento::create($dataArrayEvento);
                    }
                }
            }
        }
    }
    public function importVerbas(Request $request) 
    {
        if($request->file('file3'))
        {
            $path = $request->file('file3')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            $dataImport[] = [
                'path_file' => $path
            ];
    
            if(!empty($data) && $data->count())
            {
                $i = 0;
                
                foreach ($data->toArray() as $row)
                {
                    if(!empty($row))
                    {
                        ++$i;
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

                        $idVinc = FuncVinc::where('ug_id' ,$ug_id)->where('matricula',$row['numcad'])->get();
                        $idCal = Calendario::where('ug_id' ,$ug_id)->where('codCal',$row['codcal'])->get();
                        $idEven = Evento::where('codeve' ,$row['codeve'])->where('codtab',1)->get();

                        foreach ($idVinc as $id => $value) 
                        { 
                            $vinc_id = $value->id; 
                        }
                        foreach ($idCal as $id2 => $value2) 
                        { 
                            $cal_id = $value2->id; 
                        }
                        foreach ($idEven as $id3 => $value3) 
                        { 
                            $even_id = $value3->id; 
                        }

                        if (!is_null($ug_id) ) {
                            $dtArrayVerba[] = [
                                'ug_id' => $ug_id,
                                'vinc_id' => $vinc_id,
                                'cal_id' => $cal_id,
                                'evento_id' => $even_id,
                                'qtdRef' => $row['refeve'],
                                'valor' => $row['valeve'],
                                'orientacao' => $row['orieve']
                            ];
                        }

                        if ($i == 500) {
                            Verba::insert($dtArrayVerba);
                            $i = 0;
                            $dtArrayVerba = [];
                        }
                    }
                }
            }
        }
    }
}