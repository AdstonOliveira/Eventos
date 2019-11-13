@extends('layouts.app')
@section('content')
<div class="flex flex-column flex-wrap">
    <div class="row">

        <div class="col col-md-12 col-sm-6 text-wrap">
            <div class="card">
                <div class="card-header text-center text-success"><b>Relações de Eventos</b></div>
                <div class="col-md-12 text-right" style="padding: 20px;">
                    <div class="text-right">
                        <a href="{{url('evento/novo')}}" class="btn btn-success">Novo Evento</a>
                    </div>
                </div>
                <table class="table table-responsive-md table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th colspan='3' class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventos as $evento)
                        <tr>
                            <td>{{$evento->data}}</td>
                            <td>{{$evento->hora}}</td>
                            <td>{{$evento->nome}}</td>
                            <td>{{$evento->descricao}}</td>
                            <td>{{$evento->local}}</td>                            
                            <td>
                                <div class="btn-group d-flex justify-content-center" role="group" aria-label="First group">
                                    <a href="{{ url( '/evento/participantes/'.$evento->id ) }}" class="btn btn-primary mx-1">Participantes</a>
                                
                                    <a href="{{ url( 'evento/'.$evento->id ) }}" class="btn btn-warning mx-1">Editar</a>
                                    <form action="{{ url( 'evento/'.$evento->id ) }}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger mx-1" value="Desativar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--Eventos Inativos -->

    <div class="row">

        <div class="col col-md-12 text-wrap">
        <div class="card" >
            <div class="card-header text-center text-danger"><b>Eventos Inativos</b></div>
                <table class="table table-responsive-md table-responsive-sm">
                <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th colspan='3' class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inativos as $inativo)
                        <tr>
                            <td>{{$inativo->data}}</td>
                            <td>{{$inativo->hora}}</td>
                            <td>{{$inativo->nome}}</td>
                            <td>{{$inativo->descricao}}</td>
                            <td>{{$inativo->local}}</td>
                            <td class="flex justify-content-center">
                                <div class="btn-group d-flex justify-content-center" role="group" aria-label="First group">
                                    <form action="{{url( 'evento/'.$inativo->id )}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary" value="Reativar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@stop