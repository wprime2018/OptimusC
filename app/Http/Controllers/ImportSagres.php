<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportSagres extends Controller
{
    public function importFolha(Request $request) {
        $file = file_get_contents('xml/FolhaPagamento.xml');
        $xml = simplexml_load_string($file);
        //$campos = $xml->children('fpg', true)->ListaFolhaPagamento->children('fpg', true)->PrestacaoContas->nomeUnidGestora;
        foreach ($xml->children('fpg', true) as $key => $foPag) {
        }
        dd($foPag);

        dd($xml->children('fpg', true)->ListaFolhaPagamento->children('fpg', true)->PrestacaoContas);
        return $xml;
    }
}
