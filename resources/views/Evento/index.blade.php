@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card border-success mb-3">
                <div class="card-header text-center text-success"><b>Relações de Eventos</b></div>
                <div class="col-md-12" style="padding: 20px;">
                    <div class="text-right">
                        <a href="{{url('evento/novo')}}" class="btn btn-success">Novo Evento</a>
                    </div>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th colspan='3'>Ações</th>
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
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <a href="{{ url( 'evento/'.$evento->id ) }}" class="btn btn-warning" style="margin-right:5px">Editar</a>
                                    <form action="{{ url( 'evento/'.$evento->id ) }}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger" value="Desativar" />
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
<div class="container">
    <div class="row">

        <div class="col-md-12">
        <div class="card" >
            <div class="card-header text-center text-danger"><b>Eventos Inativos</b></div>
                <table class="table text-center">
                <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th colspan='3'>Ações</th>
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
                            <td class="flex justify-content-between">
                                <div class="btn-group mr-2 " role="group" aria-label="First group">
                                    <a href="{{url('evento/'.$inativo->id )}}" class="btn btn-warning" style="margin-right:5px">Editar</a>
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
</div>


@stop