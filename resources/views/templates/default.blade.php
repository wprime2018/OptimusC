@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.alerts')
            <div class="col-md-12">
                @yield('bodyContent')
                
                @yield('bodyScript')
            </div>
        </div>
    </div>
@endsection