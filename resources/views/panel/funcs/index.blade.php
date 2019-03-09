@extends('templates.default')

@section('bodyContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
    
        <a href="{{route('funcionarios.create')}}" class="btn btn-primary btn-lg active btn-add">
            <span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
            <p></p>
        <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"
                        style="width: 50px;">U.Gestora</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"
                        style="width: 100px;">CPF</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 200px;">Apelido</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"
                        style="width: 500px;">Nome Completo</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 187.4px;">Cargo</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 100px;">Admissão</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"
                        style="width: 100px;">Ações</th>
    
                </tr>
            </thead>
            <tbody>
                @foreach($funcs as $func)
                <tr role="row" class="odd" id="{{$func->id}}">
                    <td class="sorting_1">{{$func->fantasia}}</td>
                    <td>{{$func->cpf}}</td>
                    <td>{{$func->apelido}}</td>
                    <td>{{$func->nome}}</td>
                    <td>{{$func->nomeCargo}}</td>
                    <td>{{$func->dataAdmissao}}</td>
                    <td>
                        <a href="{{ route ( 'funcionarios.edit', $func->id ) }}" class="actions edit">
                            <span class="btn btn-primary btn-xs glyphicon glyphicon-pencil"></span>
                        </a>
    
                        <a data-toggle="modal" data-target="b1" id="btnModal1" class="btn btn-xs btn-danger btnDelete">
                            <span class="glyphicon glyphicon-remove"></span></a>
    
                    <!--{!! Form::open(['method' => 'DELETE', 'route'=>['funcionarios.destroy', $func->id], 'style'=> 'display:inline']) !!}
                        {!! Form::submit('Excluir',['class'=> 'btn btn-xs btn-danger']) !!}
                        {!! Form::close() !!}-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('bodyScript')
    <script src="{{ asset('/js/datatables/Default.js') }}"> </script>
@endsection