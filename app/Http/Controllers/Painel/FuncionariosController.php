<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Funcionarios;
use App\Models\UGestora;
use App\Models\FuncCargos;
use App\Http\Controllers\Functions;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Funcionarios $Funcs)
    {
        $this->Funcs = $Funcs;
    }

     public function index()
    {

        $title = 'Funcionarios';
//        $funcs = $this->Funcs->withTrashed()->with('vinculo')->get();
        $funcs = $this->Funcs->join('func_vincs', 'funcionarios.id', '=', 'func_vincs.func_id')
                                ->join('un_gestora', 'func_vincs.ug_id', '=', 'un_gestora.id')
                                ->join('func_cargos', 'func_vincs.cargo_id', '=', 'func_cargos.id')
                                ->select('funcionarios.id', 
                                        'funcionarios.cpf', 
                                        'funcionarios.nome', 
                                        'funcionarios.apelido', 
                                        'func_vincs.dataAdmissao', 
                                        'un_gestora.fantasia',
                                        'func_cargos.nomeCargo')
                                ->get();
        return view('panel.funcs.index', compact('funcs','title'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
