<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UGestora;
use App\Models\Folha;
use App\Models\Agentes;
use App\Models\Lancamento;
use Illuminate\Validation\Rules\Exists;
use Carbon\Carbon;
use DB;
class ImportSagres extends Controller

{
    public function importFolha(Request $request) {


        $file = file_get_contents('xml/'.$request->file1);
        $xml = simplexml_load_string($file);
        //$campos = $xml->children('fpg', true)->ListaFolhaPagamento->children('fpg', true)->PrestacaoContas->nomeUnidGestora;

        foreach ($xml->children('fpg', true) as $key => $foPag) {

            //Criando Unidade Gestora
            if (isset($foPag->nomeUnidGestora)) {

                $ug = UGestora::where('nomeUnidGestora',$foPag->nomeUnidGestora)->get();

                $countUG = count($ug);

                if(!($countUG > 0)) {
                    $unName = $foPag->nomeUnidGestora;
                    $mesFolha = $foPag->mesReferencia;
                    $anoFolha = $foPag->anoReferencia;
                    $ugCreate = UGestora::create([
                        'codigoUnidGestora' => $foPag->codigoUnidGestora,
                        'nomeUnidGestora' => $foPag->nomeUnidGestora,
                        'cpfContador' => $foPag->cpfContador,
                        'cpfGestor' => $foPag->cpfGestor
                    ]);

                    $ug_id = $ugCreate->id;

                } else {
                    foreach($ug as $ugDados) {
                        $unName = $ugDados->nomeUnidGestora;
                        $mesFolha = $ugDados->mesReferencia;
                        $anoFolha = $ugDados->anoReferencia;
                        $ug_id = $ugDados->id;
                    }

                }
            }

            if (isset($foPag->mesRefFolha)) {
                $folha = Folha::where('ug_id',$ug_id)
                                ->where('mesRefFolha',$foPag->mesRefFolha)
                                ->where('anoRefFolha',$foPag->anoRefFolha)
                                ->pluck('id');

                if( !(count( $folha )> 0)) {
                    $folhaCreate = Folha::create([
                        'ug_id'         => $ug_id,
                        'mesRefFolha'   => $foPag->mesRefFolha,
                        'anoRefFolha'   => $foPag->anoRefFolha,
                        'tipoFolha'     => $foPag->tipoFolha,
                        'seqTipoFolha'  => $foPag->seqTipoFolha
                    ]);
                    $folha_id = $folhaCreate->id;
                } else {
                    $folha_id = $folha[0];
                    Agentes::where('folha_id',$folha_id)->delete();
                }

                $agente = Agentes::where('cpfAgenPublico',$foPag->cpfAgenPublico)->where('folha_id',$folha_id)->pluck('id');

                $dataIngressoOrgao = Carbon::createFromFormat('Y-m-d', $foPag->dataIngressoOrgao);

                $agenteCreate = Agentes::create([
                    'folha_id' => $folha_id,
                    'cpfAgenPublico' => $foPag->cpfAgenPublico,
                    'numPisPasepAgenPublico' => $foPag->numPisPasepAgenPublico,
                    'numRgAgenPublico' => $foPag->numRgAgenPublico,
                    'nomeAgenPublico' => $foPag->nomeAgenPublico,
                    'numMatriculaAgenPublico' => $foPag->numMatriculaAgenPublico,
                    'nomeCargoEfetivo' => $foPag->nomeCargoEfetivo,
                    'nivelCargoEfetivo' => $foPag->nivelCargoEfetivo,
                    'simboloCargoEfetivo' => $foPag->simboloCargoEfetivo,
                    'nomeCargoExterno' => $foPag->nomeCargoExterno,
                    'nivelCargoExterno' => $foPag->nivelCargoExterno,
                    'simboloCargoExterno' => $foPag->simboloCargoExterno,
                    'cargaHorariaSemanal' => $foPag->cargaHorariaSemanal,
                    'localTrabalho' => $foPag->localTrabalho,
                    'orgaoTrabalho' => $foPag->orgaoTrabalho,
                    'dataIngressoOrgao' => $dataIngressoOrgao,
                    'tipoRegimeJuridico' => $foPag->tipoRegimeJuridico,
                    'situacaoFuncional' => $foPag->situacaoFuncional,
                    'codigoBanco' => $foPag->codigoBanco,
                    'codigoAgencia' => $foPag->codigoAgencia,
                    'numeroContBancaria' => $foPag->numeroContBancaria,
                    'qtSalarioFamilia' => $foPag->qtSalarioFamilia,
                    'qtDependentesIRPF' => $foPag->qtDependentesIRPF,
                    'valorSalarioBruto' => $foPag->valorSalarioBruto,
                    'valorTotalDescontos' => $foPag->valorTotalDescontos,
                    'valorSalarioLiquido' => $foPag->valorSalarioLiquido,
                    'valorBaseCalculoIR' => $foPag->valorBaseCalculoIR,
                    'valorDepositoFGTS' => $foPag->valorDepositoFGTS
                ]);

                foreach ($foPag->FolhaPagamentoItem as $key2 => $foPagItem) {
                    $lancamentoCreate = Lancamento::create([
                        'agente_id' => $agenteCreate->id,
                        'tipoRendDesc' => $foPagItem->tipoRendDesc,
                        'valorRendDesc' => $foPagItem->valorRendDesc,
                        'nomeRendDesc' => $foPagItem->nomeRendDesc,
                    ]);
                }
            }

        }
        if (isset($foPag->mesRefFolha)) {
            $message = 'Folha da '. $unName . ' do período '. $foPag->mesRefFolha . '/'. $foPag->anoRefFolha .' importado com sucesso!';
            return redirect()->back()->with('success', $message);

        } else {
            $message = 'Erro ao importar arquivo da Folha!';
            return redirect()->back()->with('error', $message);
        }

    }
}
