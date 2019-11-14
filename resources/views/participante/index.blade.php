@extends('layouts.app')
@section('content')

<div class="flex flex-column flex-wrap">
    <div class="row pb-2">
        <div class="col col-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header text-success text-center">
                    <b>Relações de Participantes</b>
                </div>
                <div class="card-body">
                    <div class="row pb-3">
                        <div class="d-flex col-12 col-sm-12 col-md-12 justify-content-end">
                            <a href="{{url('participante/create')}}" class="btn btn-success">Novo Participante</a>
                        </div>
                    </div>

                    <div class="row border">
                        <div class="table-responsive table-reponsive-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>RG</th>
                                        <th>CPF</th>
                                        <th>Email</th>
                                        <th>Telefone</th>
                                        <th>Dt. Nascimento</th>
                                        <th>Organização</th>
                                        <th class="flex text-center">Ações</th>
                                    </tr>
                                </thead>
                                        <tbody>
                                            @foreach($participantes as $participante)
                                            <tr>
                                                <td>{{$participante->nome}}</td>
                                                <td>{{$participante->rg}}</td>
                                                <td>{{$participante->cpf}}</td>
                                                <td>{{$participante->email}}</td>
                                                <td>{{$participante->telefone}}</td>
                                                <td>{{date('d-m-Y', strtotime($participante->data_nascimento))}}</td>
                                                <td>{{$participante->organizacao}}</td>
                    
                                                <td>
                                                    <div class="btn-group d-flex justify-content-between" role="group" aria-label="First group">
                                                        <a href="{{url('participante/'.$participante->id.'/edit')}}" class="btn btn-warning mx-1" style="margin-right:5px">Editar</a>
                                                        <form action="{{url('participante', [$participante->id])}}" method="POST">
                                                            {{method_field('DELETE')}}
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="btn btn-danger mx-1" value="Desativar" />
                                                        </form>
                                                        <a target="_blank" href="{{url('/participante/cracha/'.$participante->id )}}" class="btn btn-outline-info mx-1">
                                                            Gerar Cartão
                                                        </a>
                                                        <a href="{{url('/participante/eventos/'.$participante->id)}}" class="btn btn-outline-success mx-1">Eventos</a>

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
        </div>
    </div>
    
<!--Produto Inativo -->
<div class="row">
    <div class="col col-12 col-md-12 col-sm-12">
        <div class="card">
                <div class="card-header text-danger text-center">
                        <b>Participantes Inativos</b>
                    </div>
                    <div class="card-body">
                        <div class="row border">
                            <div class="table-responsive table-reponsive-md">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>RG</th>
                                            <th>CPF</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Dt. Nascimento</th>
                                            <th>Organização</th>
                                            <th class="flex text-center">Ações</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                @foreach($participantesInativos as $participante)
                                                <tr>
                                                    <td>{{$participante->nome}}</td>
                                                    <td>{{$participante->rg}}</td>
                                                    <td>{{$participante->cpf}}</td>
                                                    <td>{{$participante->email}}</td>
                                                    <td>{{$participante->telefone}}</td>
                                                    <td>{{$participante->data_nascimento}}</td>
                                                    <td>{{$participante->organizacao}}</td>
                        
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="First group">
                                                            <form action="{{url('participante', [$participante->id])}}" method="POST">
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