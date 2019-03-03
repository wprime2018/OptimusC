@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.alerts')
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">Importando SAGRES</div>

                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <a data-toggle="modal" data-target="b1" id="btnModal1" class="btn btn-primary btn-lg active btn-add">
                                <span class="glyphicon glyphicon-shopping-cart"></span>Importar SAGRES</a>
                            <a data-toggle="modal" data-target="b2" id="btnModal2" class="btn btn-primary btn-lg active btn-add">
                                <span class="glyphicon glyphicon-shopping-cart"></span>Importar Senior</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @component('modals.modal_primary')
        @slot('txtBtnModal')
            Importar Folha Do SAGRES
        @endslot
        @slot('triggerModal')
            b1
        @endslot
        @slot('tituloModal')
            Infome os dados
        @endslot
        @slot('actionModal')
            ImportSagres@importFolha
        @endslot
        @slot('methodModal')
            post
        @endslot
        @slot('bodyModal')
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file1"/>
                </div>
            </div>
        @endslot
        @slot('btnConfirmar')
            Importar
        @endslot
    @endcomponent

    @component('modals.modal_primary')
        @slot('txtBtnModal')
            Importar Base da Senior
        @endslot
        @slot('triggerModal')
            b2
        @endslot
        @slot('tituloModal')
            Infome os dados
        @endslot
        @slot('actionModal')
            Painel\ImportSenior@importFunc
        @endslot
        @slot('methodModal')
            post
        @endslot
        @slot('bodyModal')
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file1"/>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file2"/>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file3"/>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file4"/>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12">
                    <input type="file" name="file5"/>
                </div>
            </div>
        @endslot
        @slot('btnConfirmar')
            Importar
        @endslot
    @endcomponent

    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnModal1").click(function(){
                $("#b1").modal('show');
            });
            $("#btnModal2").click(function(){
                $("#b2").modal('show');
            });
        });
    </script>

@endsection

